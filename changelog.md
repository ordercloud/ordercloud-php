# Change Log
All notable changes to this project will be documented in this file.
This project does NOT (yet) adhere to [Semantic Versioning](http://semver.org/).
It is running as an Alfa/Beta, once v1 is reached we will start supporting semver.
For now, please use all minor versions as major versions and each build version will be a minor version.

## [Unreleased]
## Added
- `Currency` entity & `currency` to `Organisation`

### Removed
- `UserGroup` & `UserRole` entities

## [0.6.0]
## Added
- `deliveryCost` to create order call

### Changed
- `assetTypeCode` to `currencyCode` on `Payment`

### Removed
- `groups` & `organisations` from `User`

## [0.5.2]
## Added
- `JsonSerializable` to all entities - all entities can now be serialized to JSON
- `markup` to `OrderItem`
- `unitPrice` to `OrderItem`
- `tip` to `Order`
- `GetOrderInvoiceRequest` & `OrderInvoice`
- `OrderDelivery` to `Order`

## [0.5.1]
### Fixed
- `GetSettingsByOrganisationRequest` handler to send pagination parameters as query parameters

## [0.5.0]
### Added
- `InvalidArgumentException` to `EntityReflector`
- `ProductTagCriteria` for enhanced product search by tag  
- `ProductTagTypeCriteria` for enhanced product search by tag type

### Changed
- `Organisation`'s profile changed from an array of profiles to a single `Profile`
- `ProductCriteria`'s tags from integers to `ProductTagCriteria`

### Removed
- `organisation` from `ProductTag`
- `search` from `ProductCriteria` which is used by `FindProductsRequest`

## [0.4.2]
### Fixed
- Do not send empty array when body empty on http request

## [0.4.1]
### Added
- `GetOrderScheduleOptionsRequest`, `OrderService::getScheduleOptions()` & `ScheduleOption` entity
- `GetUserPaymentsToOrganisationRequest`, `PaymentService::getUserPaymentsToOrganisation()` & `PaymentCollection` entity
- `creationDate` on `Payment` entity

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

[Unreleased]: https://github.com/ordercloud/ordercloud-php/compare/0.6.0...HEAD
[0.6.0]: https://github.com/ordercloud/ordercloud-php/compare/0.5.2...0.6.0
[0.5.2]: https://github.com/ordercloud/ordercloud-php/compare/0.5.1...0.5.2
[0.5.1]: https://github.com/ordercloud/ordercloud-php/compare/0.5.0...0.5.1
[0.5.0]: https://github.com/ordercloud/ordercloud-php/compare/0.4.2...0.5.0
[0.4.2]: https://github.com/ordercloud/ordercloud-php/compare/0.4.1...0.4.2
[0.4.1]: https://github.com/ordercloud/ordercloud-php/compare/0.4.0...0.4.1
[0.4.0]: https://github.com/ordercloud/ordercloud-php/compare/0.3.1...0.4.0
