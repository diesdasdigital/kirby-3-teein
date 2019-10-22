# Kirby 3 Teein plugin

If this plugin is activated, it will require all templates to use the [Teein/Html Virtual DOM based templating-engine](https://github.com/Teein/Html).


## Installation

```bash
composer require diesdasdigital/kirby-3-teein
```

## Basic Usage

Once installed, all Kirby templates will need an explicit `return` statement, returning a Teein/HTML element:

```
<?php

use function Teein\Html\Elements\div;
use function Teein\Html\Text\text;

return div()(
  text('Hello, World!')
);
```

---

Created by [diesdas.digital](https://diesdas.digital)
