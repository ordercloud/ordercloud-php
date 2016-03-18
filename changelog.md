# Change Log
All notable changes to this project will be documented here.
This project adheres to [Semantic Versioning](http://semver.org/).

## [2.0.0]
### Changed
- `attributeSet` to `attributes` on `Product` 

### Added
- `ProductAttributeDisplay`
- `required` & `options` to `ProductAttribute` 

### Removed
- `ProductAttributeSet`
- `value` from `ProductAttribute`

## [1.6.0]
### Added
- `showDisabled` to `TagCriteria`

## [1.5.0]
### Added
- `ConflictRequestException`
- `AbstractDeleteRequestHandler`
- `ProductTagService::deleteTag()`
- `ConnectionService`

### Depricated
- `OrganisationService::getConnectionsByType()`
- `OrganisationService::getChildConnections()`
- `OrganisationService::getMarketplaceConnections()`
- `OrganisationService::getConnections()`

## [1.4.0]
### Added
- `ProductTagService`, `ProductTagCollection` & `TagCriteria`
- `ProductTagService::getTags()`
- `ProductTagService::getTagTypes()`
- `ProductTagService::createTag()`
- `ProductTagService::updateTag()`
- `ProductTagService::enableTag()`
- `ProductTagService::disableTag()`

### Fixed
- `totalNrPages` calculation on `PaginatedCollection` when page size is -1

### Depricated
- `ProductService::getProductTags()`
- `ProductService::getProductTags()`
- `GetProductTagsForOrganisationByTypeNameRequest`

## [1.3.1]
### Fixed
- `createUser()` on `UserService` not returning user ID

## [1.3.0]
### Added
- `createUser()` to `UserService`
- `getOrganisationOrders()` to `OrderService`

## [1.2.0]
### Added
- `STATUS_PARTIALLY_REJECTED` constant to `OrderStatus`
- `province` & `country` fields to `OrganisationAddress`

## [1.1.0]
### Added
- `showDisabled` to `ProductCriteria`
- `getProductsByConnection` to `ProductService` 

## [1.0.1]
### Fixed
- Removed `tag` from `ProductOptionDislplay` & `ProductExtraDisplay`

## [1.0.0]
### Added
- `Currency` entity & `currency` to `Organisation`
- Service methods (`organisations`, `users`, etc) to `Ordercloud`
- `getUnlockableOptionSets` & `getUnlockableExtraSets` to `Product`
- `name`, `value` & `description` to `ProductAttribute`
- `unlockOptionSets` & `unlockExtraSets` to `ProductOption`
- `UnlockableProductExtraSet`
- `UnlockableProductOptionSet`

### Changed
- `attributes` to `attributeSets` on `Product`
- `ProductItemAttribute` to `ProductAttributeSet`

### Removed
- `UserGroup` & `UserRole` entities
- `loggingUrlPatterns` & `loggingMethods` from `LoggingClient`
- `attributes` from `ProductExtraSet`
- `attributes` from `ProductOptionSet`

## [0.6.1]
### Added
- `additionalInfo` to `Product` entity

## [0.6.0]
### Added
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
- Fixed `scheduledTime` body parameter name on create order request

## [< 0.3.1]
### History unavailable

[Unreleased]: https://github.com/ordercloud/ordercloud-php/compare/2.0.0...HEAD
[2.0.0]: https://github.com/ordercloud/ordercloud-php/compare/1.6.0...2.0.0
[1.6.0]: https://github.com/ordercloud/ordercloud-php/compare/1.5.0...1.6.0
[1.5.0]: https://github.com/ordercloud/ordercloud-php/compare/1.4.0...1.5.0
[1.4.0]: https://github.com/ordercloud/ordercloud-php/compare/1.3.1...1.4.0
[1.3.1]: https://github.com/ordercloud/ordercloud-php/compare/1.3.0...1.3.1
[1.3.0]: https://github.com/ordercloud/ordercloud-php/compare/1.2.0...1.3.0
[1.2.0]: https://github.com/ordercloud/ordercloud-php/compare/1.1.0...1.2.0
[1.1.0]: https://github.com/ordercloud/ordercloud-php/compare/1.0.1...1.1.0
[1.0.1]: https://github.com/ordercloud/ordercloud-php/compare/1.0.0...1.0.1
[1.0.0]: https://github.com/ordercloud/ordercloud-php/compare/0.6.1...1.0.0
[0.6.1]: https://github.com/ordercloud/ordercloud-php/compare/0.6.0...0.6.1
[0.6.0]: https://github.com/ordercloud/ordercloud-php/compare/0.5.2...0.6.0
[0.5.2]: https://github.com/ordercloud/ordercloud-php/compare/0.5.1...0.5.2
[0.5.1]: https://github.com/ordercloud/ordercloud-php/compare/0.5.0...0.5.1
[0.5.0]: https://github.com/ordercloud/ordercloud-php/compare/0.4.2...0.5.0
[0.4.2]: https://github.com/ordercloud/ordercloud-php/compare/0.4.1...0.4.2
[0.4.1]: https://github.com/ordercloud/ordercloud-php/compare/0.4.0...0.4.1
[0.4.0]: https://github.com/ordercloud/ordercloud-php/compare/0.3.1...0.4.0
