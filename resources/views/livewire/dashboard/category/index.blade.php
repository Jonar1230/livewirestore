<div>
    <div>

    <x-action-message on="deleted">
        {{ __("Category delete success") }}
    </x-action-message>


       <h1>List</h1>
        <table class="table w-full">
            <thead>
                <tr>
                    <th>
                        Title
                    </th>
                    <th>
                        Actions
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $c)
                    <tr>
                        <td>
                            {{ $c->title }}
                        </td>
                        <td>
                            <a href="{{ route('d-category-edit', $c) }}">Edit</a>
                            <flux:button variant='danger' onclick="confirm('Are you sure you want to delete this category?') || event.stopImmediatePropagation()" wire:click="delete({{ $c }})">
                                {{ __('Delete') }}
                            </flux:button>

                            <x-danger-button onclick="confirm('Are you sure you want to delete this category?') || event.stopImmediatePropagation()" wire:click="delete({{ $c }})">
                                {{ __('Delete') }}
                            </x-danger-button>

                           
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <br>

        {{ $categories->links() }}

    </div>

</div>
