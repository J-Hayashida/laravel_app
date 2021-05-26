<template>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        MAIN MENU
                    </div>
                    <div class="card-body">

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-sm-2" v-for="menu in menus" :key="menu.id" style="padding-top: 5px; padding-bottom: 5px;">
                                    <!-- PC -->
                                    <div class="d-none d-sm-block">
                                        <router-link v-if="menu.url === null" class="btn btn-outline-primary btn-block" :to="{ path: '/sub_menu', query: { id: menu.id }}" role="button">
                                            <i :class="menu.icon + ' fa-3x mr-1'"></i><br/>{{ menu.name }}
                                        </router-link>
                                        <a v-else class="btn btn-outline-primary btn-block" :href="menu.url">
                                            <i :class="menu.icon + ' fa-3x mr-1'"></i><br/>{{ menu.feature_name }}
                                        </a>
                                    </div>
                                    <!-- Phone -->
                                    <div class="d-block d-sm-none">
                                        <router-link v-if="menu.url === null" class="btn btn-outline-primary btn-lg btn-block" :to="{ path: '/sub_menu', query: { id: menu.id }}" role="button">
                                            <i :class="menu.icon + ' fa-lg mr-3'"></i>{{ menu.name }}
                                        </router-link>
                                        <a v-else class="btn btn-outline-primary btn-lg btn-block" :href="menu.url">
                                            <i :class="menu.icon + ' fa-lg mr-3'"></i>{{ menu.feature_name }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        data: function () {
            return {
                menus: [],
            }
        },
        created() {
            this.getChildMenu(this.$route.query.id);
        },
        mounted() {
        },
        methods: {
            getChildMenu(parentMenuId){
                axios.get('/laravel_app/public/menu/get_child_menu?id=' + parentMenuId)
                    .then(response => this.menus = response.data);
            },
        },
    }
</script>
