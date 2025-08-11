<div>

<link href="{{ asset('app.css') }}" rel="stylesheet" />


  <form wire:submit.prevent="submit">
   
    <flux:input type="text" wire:model="title" placeholder="Title" :label="__('Title')" />

    <flux:textarea wire:model="text" placeholder="Text" :label="__('Text')" />

    <flux:button type="button" wire:click="submit">{{ __('Save') }}</flux:button>

  </form>

</div>
