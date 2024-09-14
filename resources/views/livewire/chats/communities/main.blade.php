<div>
    @section('title', $community->name)
    @section('is_community_page', true)

    @livewire('chats.communities.chat', ['community' => $community])
</div>