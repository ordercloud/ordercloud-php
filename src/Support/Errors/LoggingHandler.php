<?php namespace Ordercloud\Support\Errors;

use Exception;
use Psr\Log\LoggerInterface;
use ReflectionClass;

class LoggingHandler implements ExceptionHandler
{
    /**
     * @var LoggerInterface
     */
    protected $logger;
    /**
     * @var array|ExceptionProcessor[]
     */
    private $exceptionProcessors;

    /**
     * @param LoggerInterface            $logger
     * @param array|ExceptionProcessor[] $exceptionProcessors
     */
    public function __construct(LoggerInterface $logger, array $exceptionProcessors = [])
    {
        $this->logger = $logger;
        $this->exceptionProcessors = $exceptionProcessors;
    }

    public function handleException(Exception $exception)
    {
        $context = [
            'exception' => get_class($exception),
        ];

        $context = $this->addStackContext($exception, $context);

        $this->logger->error($exception, $context);
    }

    /**
     * @param ExceptionProcessor $exceptionProcessor
     */
    public function pushExceptionProcessor(ExceptionProcessor $exceptionProcessor)
    {
        $this->exceptionProcessors[] = $exceptionProcessor;
    }

    /**
     * Add the context of each exception in the stack.
     *
     * @param Exception $exceptionRoot
     * @param array     $context
     *
     * @return array
     */
    private function addStackContext(Exception $exceptionRoot, array $context)
    {
        $exception = $exceptionRoot;

        do {
            $context = $this->addContext($exception, $context);
        }
        while ($exception = $exception->getPrevious());

        return $context;
    }

    /**
     * @param Exception $exception
     * @param array     $context
     *
     * @return array
     */
    private function addContext(Exception $exception, array $context)
    {
        foreach ($this->exceptionProcessors as $exceptionProcessor) {
            if ($exceptionProcessor->handlesException($exception)) {
                $context = $exceptionProcessor->processExceptionContext($exception, $context);
            }
        }

        return $context;
    }
}
