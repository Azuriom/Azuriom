<?php

namespace Azuriom\Http\Requests\Traits;

trait ConvertCheckbox
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->mergeCheckboxes();
    }

    protected function mergeCheckboxes()
    {
        $attribute = [];

        foreach ($this->checkboxes as $checkbox) {
            $attribute[$checkbox] = $this->has($checkbox);
        }

        $this->merge($attribute);
    }
}
