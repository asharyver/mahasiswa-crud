<template>
    <main class="main">
        <headful
            v-bind:title="'Menampilkan ' + fullname + ' - ' + appName"
            description="Mahasiswa"
        />
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item">Mahasiswa</li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                {{ fullname }}
                            </div>
                            <div class="card-body">
                                <form action="" class="form-horizontal">
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Nama Lengkap</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">: {{ fullname }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Alamat Email</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">: {{ email }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Jurusan</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">: {{ major }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Alamat</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">: {{ address }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">: {{ birth }}</p>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-md-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-md-9">
                                            <p class="form-control-static">: {{ gender == 'male' ? 'Laki-laki' : 'Wanita'}}</p>
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
        created() {
            let app = this;
            this.id = this.$route.params.id;
            this.$http.get(apiUrl() + '/mahasiswa/' + this.id)
                .then(function(res) {
                    res = res.data;
                    app.id = res.id;
                    app.fullname = res.fullname;
                    app.email = res.email;
                    app.major = res.major_name;
                    app.address = res.address;
                    app.birth = res.birth;
                    app.gender = res.gender;
                    app.created_at = res.created_at;
                    app.updated_at = res.updated_at;
                })
                .catch(function(res) {
                    
                })
        },
        data: function() {
            return {
                id: null,
                fullname: '',
                email: null,
                major: '',
                address: null,
                birth: null,
                gender: '',
                created_at: null,
                updated_at: null
            }
        }
    }
</script>
