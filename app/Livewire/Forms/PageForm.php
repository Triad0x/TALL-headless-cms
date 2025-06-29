<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class PageForm extends Form
{
    #[Validate('required|min:3|max:255')]
    public $title = '';

    #[Validate('required|in:draft,published')]
    public $status = 'draft';

    #[Validate('required|string|min:10')]
    public $body = '';
}
