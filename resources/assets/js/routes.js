export default [
        {
            path: '/404',
            name: '404',
            component: require('./components/PageNotFound.vue'),
            meta: {
                error: true
            }
        },
        {
            path: '/',
            name: 'home',
            component: require('./components/Home.vue'),
            meta: {
                auth: true
            }
        },
        {
            path: '/mahasiswa',
            name: 'mahasiswa',
            component: require('./components/Mahasiswa.vue'),
            meta: {
                auth: true
            }
        },
        {
            path: '/mahasiswa/create',
            name: 'create.mahasiswa',
            component: require('./components/CreateMahasiswa'),
            meta: {
                auth: true
            }
        },
        {
            path: '/mahasiswa/show/:id',
            name: 'show.mahasiswa',
            component: require('./components/ShowMahasiswa'),
            meta: {
                auth: true
            }
        },
        {
            path: '/mahasiswa/edit/:id',
            name: 'edit.mahasiswa',
            component: require('./components/EditMahasiswa'),
            meta: {
                auth: true
            }
        },
        // {
        //     path: '/register',
        //     name: 'register',
        //     // component: Register,
        //     meta: {
        //         auth: false
        //     }
        // },
        {
            path: '/login',
            name: 'login',
            component: require('./components/Login.vue'),
            meta: {
                auth: false
            }
        },
        // {
        //     path: '/dashboard',
        //     name: 'dashboard',
        //     component: Dashboard,
        //     meta: {
        //         auth: true
        //     }
        // }
    ]
