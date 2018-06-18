<template>
    <div class="container">
        <headful
            v-bind:title="'Login - ' + appName"
            description="Login area"
        />
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card-group">
                    <div class="card p-4">
                        <div class="card-body">
                            <h1>Login</h1>
                            <p class="text-muted">Sign In to your account</p>
                            <div class="alert alert-danger" v-if="errors.length">
                                <ul class="list-unstyled" style="margin: 0">
                                    <li v-for="error in errors">{{ error }}</li>
                                </ul>
                            </div>
                            <form autocomplete="off" @submit.prevent="login" method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-user"></i>
                                        </span>
                                    </div>
                                    <input type="text" id="username" name="username" class="form-control" placeholder="Username" v-model="username" />
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="icon-lock"></i>
                                        </span>
                                    </div>
                                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" v-model="password" />
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary px-4" v-on:click.prevent="login">Login</button>
                                    </div>
                                    <div class="col-6 text-right">
                                        <button type="button" class="btn btn-link px-0">Forgot password?</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data(){
            return {
                username: null,
                password: null,
                errors: []
            }
        },
        
        methods: {
            login() {
                // Reset error
                this.errors = [];
                
                if (this.username == null) {
                    this.errors.push('Nama pengguna dibutuhkan !');
                    document.getElementById('username').focus();
                    return false;
                } else if (this.password == null) {
                    this.errors.push('Kata sandi dibutuhkan !');
                    document.getElementById('password').focus();
                    return false;
                }
                
                var app = this
                
                this.$auth.login({
                    params: {
                        username: app.username,
                        password: app.password
                    }, 
                    success: function (res) {
                        console.log(res);
                    },
                    error: function (resp) {
                        app.errors.push(resp.response.data.msg);
                        app.username = null;
                        app.password = null;
                    },
                    rememberMe: true,
                    redirect: '/',
                    fetchUser: true
                });
            }
        }
    }
</script>
