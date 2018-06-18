<template>
    <main class="main">
        <headful
            v-bind:title="'Dashboard - ' + appName"
            description="Dashboard"
        />
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
       <div class="container-fluid">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                Welcome to this application. 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
