<template>
    <ul class="ml-10 flex space-x-4">
        <li><NavLink href="/" :param="$page.component === 'Home'">Home</NavLink></li>
        <li><NavLink href="/user" :param="$page.component === 'User/Index'">User</NavLink></li>
        <li><NavLink href="/setting" :param="$page.component === 'Setting'">Setting</NavLink></li>
        <li><NavLink href="/logout" method="POST" as="button">Log Out</NavLink></li>
    </ul>
</template>


<script>
import NavLink from "./NavLink";
export default {
    components: {NavLink}
}
</script>
