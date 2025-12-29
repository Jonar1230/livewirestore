<div>


<x-action-message on="created">
    {{ __("Category created successfully.") }}
</x-action-message>

<x-action-message on="updated">
    {{ __("Category updated successfully.") }}
</x-action-message>

<!-- <form wire:submit.prevent="submit" class="flex flex-col gap-4">

    <flux:input type="text" wire:model="title" placeholder="Title" :label="__('Title')" />
    <flux:textarea wire:model="text" placeholder="Text" :label="__('Text')" />

    <div>
    <flux:button type="button" wire:click="submit">{{ __('Save') }}</flux:button>
    </div>

  </form> -->


      <form wire:submit.prevent='submit'>

        <label for="">Title</label>
        <input type="text" wire:model.live="title">
        @error('title')
            {{ $message }}
        @enderror

        <label for="">Text</label>
        <input type="text" wire:model="text">
        @error('text')
            {{ $message }}
        @enderror

        <label for="">Image</label>
        <input type="file" wire:model="image">
        @error('image')
            {{ $message }}
        @enderror


        <button type="submit">Send</button>
    </form>


</div>
