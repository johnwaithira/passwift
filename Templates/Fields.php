<?php

namespace Waithira\Passwift\Templates;

class Fields
{

    public const TEXT = "text";
    public const PASSWORD = "password";
    public const EMAIL = "email";
    public const NUMBER = "number";
    public const FILE = "file";

    public const MULTIPLE = "multiple";
    public const HIDDEN = "hidden";

    public string $multiple;
    public string $hidden;
    public string $type;
    public string $placeholder;
    public string $id;
    public string $value;
    public string $class;
    public string $border;
    public string $inputclass;
    
    /**
     * @param $attribute
     */
    public string $attribute;

    public function __construct(string $attribute)
    {
        $this->attribute = $attribute;
        $this->type = self::TEXT;
        $this->multiple = "";
        $this->hidden = "";
        $this->border = "b-one";
        $this->placeholder = $this->attribute;
        $this->id = $this->attribute;
        $this->value = "";
        $this->class = "";
        $this->inputclass = "";
    }
    public function __toString(): string
    {
       return sprintf( 
            `<input type="%s" name="%s" id="%s" placeholder="%s" value ="%s" %s %s style="border: 1px solid #ccd0d5;"  class="p-15-17 w-p-100 b-r-6 %s">
            `,
                $this->type,
                $this->attribute,
                str_replace(
                    '[]',
                    '',
                    $this->id
                ),
                str_replace(
                    $this->placeholder[0],
                    strtoupper($this->placeholder[0]),
                    $this->placeholder
                ),
                $this->value, 
                $this->multiple,
                $this->hidden,
                $this->inputclass
            );
        // return sprintf(
        //     '<div class="%s p-3-15 m-t-4 %s">
        //         <input type="%s" name="%s" id="%s" placeholder="%s" value ="%s" %s %s
        //             class="f-s-17 b-n outline-none p-10-15 w-p-100 %s">
        //     </div>
        //     ',
        //     $this->border,
        //     $this->class,
        //     $this->type,
        //     $this->attribute,
        //     str_replace(
        //         '[]',
        //         '',
        //         $this->id
        //     ),

        //     str_replace(
        //         $this->placeholder[0],
        //         strtoupper($this->placeholder[0]),
        //         $this->placeholder
        //     ),
        //     $this->value,
        //     $this->multiple,
        //     $this->hidden,
        //     $this->inputclass
        // );
    }

    public function file(): static
    {
        $this->type = self::FILE;
        return $this;
    }

    public function number(): static
    {
        $this->type = self::NUMBER;
        return $this;
    }
    public function email(): static
    {
        $this->type = self::EMAIL;
        return $this;
    }
    public function password(): static
    {
        $this->type = self::PASSWORD;
        return $this;
    }

    public function class($additionalClass) : static
    {
        $this->class = $additionalClass;
        return $this;
    }

    public function inputclass($additionalClass) : static
    {
        $this->inputclass = $additionalClass;
        return $this;
    }
    public function multiple(): static
    {
        $this->multiple = self::MULTIPLE;
        return $this;
    }

    public function hidden(): static
    {
        $this->multiple = self::HIDDEN;
        return $this;
    }

    /**
     * @param $customPlacehoder
     * @return $this
     */
    public function placeholder($customPlacehoder): static
    {
        $this->placeholder = $customPlacehoder;
        return $this;
    }
    public function id($string): static
    {
        $this->id = $string;
        return $this;
    }
    public function value($string): static
    {
        $this->value = $string;
        return $this;
    }
    public function textarea($name)
    {
        $this->textarea = $name;
        return $this;
    }
    
    public function border()
    {
        $this->border = "b-n-i";
    }
}