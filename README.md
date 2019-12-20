# Kirby 3 Teein plugin

If this plugin is activated, it will require all Kirby templates to use the [Teein/Html Virtual DOM based templating-engine](https://github.com/Teein/Html).

## Installation

```bash
composer require diesdasdigital/kirby-3-teein
```

## Basic Usage

Once installed, all Kirby templates will need an explicit `return` statement, returning a Teein/HTML element:

```php
<?php

use function Teein\Html\Elements\div;
use function Teein\Html\Text\text;

return div()(
  text('Hello, World!')
);
```

## Adding Your Own Component

You can add your own components which output Teein/Html elements.

Firstly, name and save your component php file. We'll use the example **grid.php**.

Secondly, add a namespace at the top of your component file. For example, this can be the project name. In the example **grid.php** file, we'll use `namespace Test\Components`:

```php
<?php

namespace Test\Components;
```

Thirdly, within your component file import the relevant Teein/Html functions using the `use` keyword and output them:

```php
<?php

namespace Test\Components;

use function Teein\Html\Text\text;
use function Teein\Html\Elements\div;
use function Teein\Html\Attributes\class_;

function grid(array $children)
{
  return div(class_("grid"))(
    div(class_("grid__column"))(
      ...array_map(function ($child) {
        return $child;
      }, $children)
    ));
}

```

In order to reference this component in other files, you'll need to add the file path to `autoload` `files` in your composer.json file:

```json
"autoload": {
  "files": [
    "site/templates/components/grid.php"
  ]
}
```

Following this, run `composer dump-autoload` to make the component available in other files.

You can now reference this component in other templates:

```php
<?php

use function Test\Components\grid;
use function Teein\Html\Elements\div;
use function Teein\Html\Text\text;

return div()(
    grid([
        div()(text('Column')),
        div()(text('Column')),
        div()(text('Column'))
    ])
);
```

---

Created by [diesdas.digital](https://diesdas.digital)
