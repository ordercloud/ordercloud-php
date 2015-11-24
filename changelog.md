# Change Log
All notable changes to this project will be documented in this file.
This project does NOT (yet) adhere to [Semantic Versioning](http://semver.org/).
It is running as an Alfa/Beta, once v1 is reached we will start supporting semver.
For now, please use all minor versions as major versions and each build version will be a minor version.


## [Unreleased]
### Added
- `GetOrderScheduleOptionsRequest`, `OrderService::getScheduleOptions()` & `ScheduleOption` entity

## [0.4.0]
### Removed
- `amount` from `CreateCreditCardPaymentRequest` & `CreateCashOnDeliveryPaymentRequest`

### Changed
- Renamed `deliveryTime` -> `scheduledTime` on `CreateOrderRequestBuilder` & `CreateOrderRequest`
- Renamed `scheduledDeliveryDate` -> `scheduledDate` on `Order` entity
- Changed order's payment status from `PaymentStatus` to `OrderPaymentStatus`
- Searching by tag uses a tag ID and not a tag name anymore

### Added
- Added `SettingCriteria`
- `threeDSecure` & `threeDSecureReturnUrl` on `CreateCreditCardPaymentRequest`
- `CreditCardPaymentFailedException`
- `GetPaymentThreeDSecureRequest` & `PaymentService::getPaymentThreeDSecure()`
- `GetPaymentRequest` & `PaymentService::getPayment()`
- `OrderPaymentStatus`
- `contactNumber` to `OrderItemMerchant`
- `GetProductTagRequest` & `ProductService::getProductTag()`

### Fixed
- Fixed "scheduledTime" body parameter name on create order request

## [< 0.3.1]
### History unavailable

[Unreleased]: https://github.com/ordercloud/ordercloud-php/compare/0.4...HEAD
[0.4]: https://github.com/ordercloud/ordercloud-php/compare/0.3.1...0.4
