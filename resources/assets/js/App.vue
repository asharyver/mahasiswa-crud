<template>
    <div v-if="$auth.check() && isErrorPage" class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
        <app-header></app-header>
        <div class="app-body">
            <app-sidebar></app-sidebar>
            <router-view></router-view>
        </div>
        <app-footer></app-footer>
    </div>
    <div v-else class="app flex-row align-items-center">
        <router-view></router-view>
    </div>
</template>
<script>
    export default {
        data: {
            isErrorPage: false
        },
        created() {
            this.isErrorPage = window.localStorage.getItem('isErrorPage') != 'true'
        }
    }
</script>
