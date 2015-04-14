<?php namespace Ordercloud\Products;

use Ordercloud\Organisations\Organisation;

class ProductOption
{
    /** @var integer */
    private $id;
    /** @var number */
    private $price;
    /** @var undefined */ //TODO
    private $customOption;
    /** @var undefined */ //TODO
    private $libraryOption;
    /** @var boolean */
    private $enabled;
    /** @var Organisation */
    private $organisation;

}
