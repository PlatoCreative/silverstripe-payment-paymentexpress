# SilverStripe Payment PaymentExpress Module

**Based on silverstripe-payment-paymentexpress by Frank Mullenger. DPS details moved to SiteConfig to allow for use across Sub Sites**

## Maintainer Contacts
*  [Plato Creative](https://github.com/platocreative)

## Requirements
* SilverStripe 3.0.x
* Payment module 1.0.x

## Documentation
Payment Express PxPay integration for payment module. This module currently supports [PxPay](http://www.paymentexpress.com/Technical_Resources/Ecommerce_Hosted/PxPay.aspx) only, meaning payments are processed on the PaymentExpress site.

### Installation Instructions
1. Place this directory in the root of your SilverStripe installation and call it 'payment-paymentexpress'.
2. Visit yoursite.com/dev/build?flush=1 to rebuild the database.

### Usage Overview
Enable in your application YAML config (e.g: mysite/_config/payment.yaml:

```yaml
PaymentGateway:
  environment:
    'dev'

PaymentProcessor:
  supported_methods:
    dev:
      - 'PaymentExpressPxPay'
    live:
      - 'PaymentExpressPxPay'
```
Configure using your PaymentExpress account details are now set through site config. These are editable under settings / PXPay Info.

By default the gateway class can accept NZD, USD or GBP (see PaymentExpressGateway_PxPay::$supportedCurrencies). Usually your PaymentExpress account will be for a single currency that matches your merchant account. To specify this currency as the single acceptable currency alter the YAML config file e.g: a configuration that will only process payments in Australian dollars:

```yaml
PaymentExpressGateway_PxPay:
  live:
    supported_currencies:
      'AUD' : 'Australian Dollar'
  dev:
    supported_currencies:
      'AUD' : 'Australian Dollar'
```

**Note:** Remember to ?flush=1 after changes to the config YAML files.

### Testing

1. Set up a [developer account with PaymentExpress](http://www.paymentexpress.com/Knowledge_Base/Getting_Set_Up_Guides/3D_Secure).
2. Retrieve PxPayUserId and PxPayKey values and configure module accordingly using the dev environment.
3. Install the SilverStripe payment test module or supporting ecommerce module and process a payment with [test credit card details](http://www.paymentexpress.com/Knowledge_Base/Frequently_Asked_Questions/Developer_FAQs#Testing Details).
4. Log in to your [developer account on PaymentExpress](https://www.paymentexpress.com/pxmi/logon) and go to Transactions->Transaction Search to view the payment that you processed.


