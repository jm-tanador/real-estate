<template>
    <v-app>
        <v-app-bar
            density="compact"
            color="primary"
            prominent
            v-if="$route.name && $route.name !== 'Login'"
        >
            <v-app-bar-nav-icon variant="text" @click.stop="drawer = !drawer"></v-app-bar-nav-icon>
            <v-toolbar-title>Laravel 9 + Vue 3</v-toolbar-title>
        </v-app-bar>


        <v-navigation-drawer
            v-model="drawer"
            temporary
        >
            <v-list density="compact" class="pt-0" >
                <v-list-item
                    v-for="(item, i) in menuItems"
                    :key="i"
                    :value="item"
                    color="primary"
                    :to="item.path"
                >
                    <template v-slot:prepend>
                        <v-icon :icon="item.icon"></v-icon>
                    </template>
                    <v-list-item-title>{{ item.name }}</v-list-item-title>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-main>
            <router-view></router-view>
        </v-main>
    </v-app>
</template>

<script>
import { useRouter } from 'vue-router';

export default {
    data: () => ({
        drawer: false,
        items: useRouter(),
    }),
    computed: {
        menuItems() {
            const router = useRouter();
            return router.options.routes.filter(r => r.name !== 'Login');
        }
    },
}
</script>
