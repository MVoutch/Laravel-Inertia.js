<template>
    <Head title="Demo App">
        <meta property="description" content="Someday everyone will remember" head-key="description">
    </Head>
    <header class="flex justify-between	bg-gray-100 py-5 px-6">
        <dav class="flex items-center">
            <p class="font-bold text-lg">My App</p>
            <p class="ml-5">Welcome back, {{username}}!</p>
        </dav>
        <Nav></Nav>
    </header>

    <div class="mx-10 my-10">
        <iframe width="100%" height="166" class="mb-10" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/957322630&color=%23ff5500&auto_play=false&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true"></iframe><div style="font-size: 10px; color: #cccccc;line-break: anywhere;word-break: normal;overflow: hidden;white-space: nowrap;text-overflow: ellipsis; font-family: Interstate,Lucida Grande,Lucida Sans Unicode,Lucida Sans,Garuda,Verdana,Tahoma,sans-serif;font-weight: 100;"><a href="https://soundcloud.com/lil17thclown" title="lil 17th" target="_blank" style="color: #cccccc; text-decoration: none;">lil 17th</a> · <a href="https://soundcloud.com/lil17thclown/akatsuki" title="Akatsuki" target="_blank" style="color: #cccccc; text-decoration: none;">Akatsuki</a></div>
        <slot></slot>
    </div>
</template>

<script>
import Nav from "../components/Nav";
export default {
    components: {Nav},

    computed: {
        username() {
            return this.$page.props.auth.user.username;
        }
    }
}
</script>
