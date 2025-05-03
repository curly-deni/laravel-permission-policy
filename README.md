# Laravel Permission Policy

[![Latest Version on Packagist](https://img.shields.io/packagist/v/curly-deni/laravel-permission-policy.svg?style=flat-square)](https://packagist.org/packages/curly-deni/laravel-permission-policy)
[![Code Style](https://img.shields.io/github/actions/workflow/status/curly-deni/laravel-permission-policy/fix-php-code-style-issues.yml?branch=main\&label=code%20style\&style=flat-square)](https://github.com/curly-deni/laravel-permission-policy/actions?query=workflow%3A%22Fix+PHP+code+style+issues%22+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/curly-deni/laravel-permission-policy.svg?style=flat-square)](https://packagist.org/packages/curly-deni/laravel-permission-policy)

**A simple and flexible way to define and apply CRUD policies in Laravel using traits.**
Designed to work seamlessly with [`laravel-permission-maker`](https://github.com/curly-deni/laravel-permission-maker) 🎯

---

## ✨ Features

* ✅ Out-of-the-box CRUD permission checks
* 🔒 Support for private resource visibility
* 👤 Ownership-based access control
* 🧩 Easy integration using traits
* ⚙️ Configurable behavior via simple settings

---

## 📦 Installation

Install the package via Composer:

```bash
composer require curly-deni/laravel-permission-policy
```

---

## ⚙️ Configuration

After publishing the config file with:

```bash
php artisan vendor:publish --tag="laravel-permission-policy-config"
```

You’ll get the following settings in `config/permission-policy.php`:

```php
return [

    'register_gate' => true, // Automatically register default gate with policy bindings

    // Toggle specific permission checks:
    'read_check' => false,   // Use 'read' instead of 'view'
    'view_check' => true,    // Check for 'view' permission
    'create_check' => true,  // Check for 'create' permission
    'update_check' => true,  // Check for 'update' permission
    'delete_check' => true,  // Check for 'delete' permission
];
```

> 🛠️ **Note:** If you disable the automatic `gate` registration (`'register_gate' => false`), make sure your custom gate implementation supports passing policy arguments via **query parameters**.
> You can use the included helper functions to handle this:
>
> * `encodeClassWithParams(string $class, array $params): string`
    >   Encodes a class name and arguments into a query-safe string.
>
> * `decodeClassWithParams(string $encoded): array`
    >   Decodes the encoded string back into the original class name and parameters.

---

## 🚀 Usage

This package is intended to be used **with** [laravel-permission-maker](https://github.com/curly-deni/laravel-permission-maker).

Choose the trait that suits your needs:

| Trait                                                                             | Description                           |
| --------------------------------------------------------------------------------- | ------------------------------------- |
| [`HasResourcePolicy`](src/Traits/HasResourcePolicy.php)                           | Basic CRUD permission checks          |
| [`HasPrivateResourcePolicy`](src/Traits/HasPrivateResourcePolicy.php)             | Adds private resource view checks     |
| [`HasOwnResourcePolicy`](src/Traits/HasOwnResourcePolicy.php)                     | Enables edit/delete for own resources |
| [`HasOwnAndPrivateResourcePolicy`](src/Traits/HasOwnAndPrivateResourcePolicy.php) | Combines ownership and private access |

---

## 🤝 Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md) for contribution guidelines.

---

## 🙌 Credits

* [Danila Mikhalev](https://github.com/curly-deni)
* [All Contributors](../../contributors)

---

## 📄 License

This package is open-sourced software licensed under the [MIT license](LICENSE.md).
