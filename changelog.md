# Change Log
All notable changes to this project will be documented in this file.
This project does not (yet) adhere to [Semantic Versioning](http://semver.org/).

## [Unreleased]
### Removed
- `amount` from `CreateCreditCardPaymentRequest` & `CreateCashOnDeliveryPaymentRequest`

### Changed
- Renamed `deliveryTime` -> `scheduledTime` on `CreateOrderRequestBuilder` & `CreateOrderRequest`
- Renamed `scheduledDeliveryDate` -> `scheduledDate` on `Order` entity

### Added
- `threeDSecure` on `CreateCreditCardPaymentRequest`
- `CreditCardPaymentFailedException`

## [< 0.3.1]
### History unavailable
