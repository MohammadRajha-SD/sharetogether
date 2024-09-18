<div>
    @section('title', $community->name)
    @section('is_navbar_hided', true)

    @livewire('chats.communities.chat', ['community' => $community])
</div>