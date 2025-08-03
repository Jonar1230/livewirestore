<div>

  <form wire:submit.prevent="submit">
    <input type="text" wire:model="title" placeholder="Title">
    <textarea wire:model="text" placeholder="Text"></textarea>
    <button type="submit" wire:click="submit">Send</button>
  </form>

</div>
