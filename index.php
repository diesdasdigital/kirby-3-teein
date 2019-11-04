<?php

use function Teein\Html\Beautifier\beautify;
use function Teein\Html\Document\document;
use function Teein\Html\ToHtml\toHtml;

class TeeinTemplate extends Kirby\Cms\Template {
    /**
     * @param array $data
     * @return string
     */
    public function render(array $data = []): string
    {
        return $this->load($this->file(), $data);
    }

    /**
     * Renders the template
     *
     * @param string $__file
     * @param array $__data
     * @return string
     */
    public static function load(string $__file = null, array $__data = []): string
    {
        if (file_exists($__file) === false) {
            return '';
        }

        extract($__data);
        return toHtml(beautify(document(include $__file)));
    }
}

Kirby::plugin('my/template', [
    'components' => [
        'template' => function (Kirby\Cms\App $kirby, string $name, string $type = 'html', string $defaultType = 'html') {
            return new TeeinTemplate($name, $type, $defaultType);
        }
    ]
]);
