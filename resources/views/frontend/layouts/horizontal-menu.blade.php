<nav class="horizontalMenu clearfix">
    <ul class="horizontalMenu-list">
        <x-frontend.form.li :name="trans('header.home')" icon="fa-home"  />
        <x-frontend.form.li :name="trans('header.home_business')" icon="fa-briefcase" route="login"  />
        <x-frontend.form.li :name="trans('header.notifications')" icon="fa-bell" route="login"  />
        <x-frontend.form.li :name="trans('header.help_hands')" icon="fa-hands-helping" route="login"  />
        <x-frontend.form.li :name="trans('header.chats')" icon="fa-comments" route="login"  />
    </ul>
</nav>
