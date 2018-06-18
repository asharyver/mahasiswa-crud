<template>
    <main class="main">
    <headful v-bind:title="'Mahasiswa - ' + appName" description="Mahasiswa" />
    <!-- Breadcrumb-->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item">
            <a href="#">Admin</a>
        </li>
        <li class="breadcrumb-item active">Dashboard</li>
        <!-- Breadcrumb Menu-->
        <li class="breadcrumb-menu d-md-down-none">
            <div class="btn-group" role="group" aria-label="Button group">
                <a class="btn" href="#">
                    <i class="icon-speech"></i>
                </a>
                <a class="btn" href="./">
                    <i class="icon-graph"></i> Dashboard</a>
                <a class="btn" href="#">
                    <i class="icon-settings"></i> Settings</a>
            </div>
        </li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="alert alert-danger" v-for="(error) in errors">
                                {{ error }}
                            </div>
                            <form v-bind:action="currentUrl" method="POST" v-on:submit.prevent="create">
                                <div class="form-group">
                                    <label for="fullname">Nama Lengkap</label>
                                    <input type="text" id="fullname" name="fullname" class="form-control" placeholder="Nama lengkap" v-model="fullname" />
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" v-model="email" />
                                </div>
                                <div class="form-group">
                                    <label for="major">Jurusan</label>
                                    <select name="major" id="major" class="form-control" v-model="major">
                                        <option value="">Pilih salah satu</option>
                                        <option v-for="val of jurusan" v-bind:value="val.id">{{ val.name }}</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <input type="text" id="address" name="address" class="form-control" placeholder="Alamat" v-model="address" />
                                </div>
                                <div class="form-group">
                                    <label for="birthday">Tanggal lahir</label>
                                    <input type="date" id="birthday" name="birthday" class="form-control" placeholder="Tanggal lahir" v-model="birth" />
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control" v-model="gender">
                                        <option value="">Pilih Gender</option>
                                        <option value="male">Lelaki</option>
                                        <option value="female">Wanita</option>
                                        <option value="other">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" v-bind:disabled="loading == true">Simpan</button>
                                    <div id="fountainG" v-if="loading">
                                        <div id="fountainG_1" class="fountainG"></div>
                                        <div id="fountainG_2" class="fountainG"></div>
                                        <div id="fountainG_3" class="fountainG"></div>
                                        <div id="fountainG_4" class="fountainG"></div>
                                        <div id="fountainG_5" class="fountainG"></div>
                                        <div id="fountainG_6" class="fountainG"></div>
                                        <div id="fountainG_7" class="fountainG"></div>
                                        <div id="fountainG_8" class="fountainG"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
</template>
<script>
    export default {
        data: function() {
            return {
                fullname: null,
                email: null,
                major: '',
                address: null,
                birth: null,
                gender: '',
                jurusan: [],
                errors: [],
                loading: false
            }
        },
        created() {
            let app = this;
            this.$http.get(apiUrl() + '/jurusan')
                .then(function(res) {
                    app.jurusan = res.data;
            });
        },
        methods: {
            create() {
                if (this.loading) {
                    return false;
                }
                
                let app = this;
                app.loading = true;
                app.errors = null;
                this.$http.post(apiUrl() + '/mahasiswa', {
                    fullname: app.fullname,
                    email: app.email,
                    major: app.major,
                    address: app.address,
                    birth: app.birth,
                    gender: app.gender
                }).then(function(res){
                    app.loading = false;
                    window.localStorage.setItem('success', JSON.stringify([
                                                                          'Mahasiswa baru telah ditambahkan'
                                                                          ]));
                    app.$router.push({name: 'mahasiswa'});
                }).catch(function(res) {
                    if (res.response != undefined) {
                        app.errors = res.response.data.errors
                    }
                    app.loading = false;
                });
            }
        }
    }
</script>
