<template>
    <main class="main">
        <headful
            v-bind:title="'Mahasiswa - ' + appName"
            description="Mahasiswa"
        />
            <!-- Breadcrumb-->
            <ol class="breadcrumb">
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Dashboard</li>
            <li class="breadcrumb-item active">Mahasiswa</li>
        </ol>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                         <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <router-link v-bind:to=" { name: 'create.mahasiswa' } " class="btn btn-primary">Create</router-link>
                                </div>
                                <div class="card-body">
                                    <div class="alert alert-success" v-for="val in success">
                                        {{ val }}
                                    </div>
                                    <vuetable ref="vuetable"
                                        v-bind:api-url="APIUrl + '/mahasiswa'"
                                        v-bind:fields="fields"
                                        pagination-path=""
                                        v-bind:css="css.table"
                                        v-bind:sort-order="sortOrder"
                                        v-bind:multi-sort="true"
                                        v-bind:http-options = "options"
                                        @vuetable:pagination-data="onPaginationData">
                                        <template slot="actions" slot-scope="props">
                                            <div class="table-button-container">
                                                <button class="btn btn-sm btn-primary" @click="showRow(props.rowData)"><i class="fa fa-search"></i></button>
                                                <button class="btn btn-sm btn-success" @click="editRow(props.rowData)"><i class="fa fa-pencil"></i></button>
                                                <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteModal" v-on:click="deleteRow(props.rowData)"><i class="fa fa-trash"></i></button>
                                                <!-- <button class="btn btn-warning btn-sm" @click="editRow(props.rowData)">
                                                    <span class="glyphicon glyphicon-pencil"></span> Edit</button>&nbsp;&nbsp;
                                                <button class="btn btn-danger btn-sm" @click="deleteRow(props.rowData)">
                                                    <span class="glyphicon glyphicon-trash"></span> Delete</button>&nbsp;&nbsp; -->
                                            </div>
                                        </template>
                                    </vuetable>
                                        
                                        <vuetable-pagination ref="pagination"
                                            :css="css.pagination"
                                            @vuetable-pagination:change-page="onChangePage"
                                        ></vuetable-pagination>
                                </div>
                            </div>
                         </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Delete {{ deleteInfo.fullname }} ?</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure to delete {{ deleteInfo.fullname }} ?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-danger" v-on:click.prevent="deleteMahasiswa">Delete</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </main>
</template>
<script>
    import Vuetable from 'vuetable-2/src/components/Vuetable';
    import VuetablePagination from 'vuetable-2/src/components/VuetablePagination';
    
    export default {
        created() {
            this.success = JSON.parse(
                                      window.localStorage.getItem('success')
                                      );
            
            window.localStorage.removeItem('success');
        },
        components: {
            Vuetable,
            VuetablePagination
        },
        data: function() {
            return {
                success: [],
                deleteInfo: [],
                options: {
                    headers: {
                      Authorization: 'Bearer ' + window.localStorage.getItem('default_auth_token')
                    }
                },
                fields: [{
                    name: 'id',
                    sortField: 'id',
                    title: "ID"
                },{
                    name: 'fullname',
                    sortField: 'fullname',
                    title: 'Nama Lengkap'
                },{
                    name: 'email',
                    sortField: 'email',
                    title: 'Email'
                },{
                    name: 'major',
                    sortField: 'major',
                    title: 'Jurusan'
                },{
                    name: '__slot:actions',
                    title: 'Actions',
                    titleClass: 'text-center',
                    dataClass: 'text-center'
                }],
                css: {
                    table: {
                        tableClass: 'table table-bordered table-striped table-hover',
                        ascendingIcon: 'fa fa-angle-up',
                        descendingIcon: 'fa fa-angle-down'
                    },
                    pagination: {
                        wrapperClass: 'pagination',
                        activeClass: 'active',
                        disabledClass: 'disabled',
                        pageClass: 'page-item',
                        linkClass: 'link',
                        icons: {
                            first: '',
                            prev: '',
                            next: '',
                            last: '',
                        },
                    },
                    icons: {
                        first: 'glyphicon glyphicon-step-backward',
                        prev: 'glyphicon glyphicon-chevron-left',
                        next: 'glyphicon glyphicon-chevron-right',
                        last: 'glyphicon glyphicon-step-forward',
                    }
                },
                sortOrder: [{
                        field: 'id',
                        sortField: 'id',
                        direction: 'asc'
                    }
                ],
                moreParams: {}
            };
        },
        methods: {
            onPaginationData (paginationData) {
                this.$refs.pagination.setPaginationData(paginationData)
                // this.$refs.paginationInfo.setPaginationData(paginationData)
            },
            onChangePage (page) {
                this.$refs.vuetable.changePage(page)
            },
            showRow(rowData){
                let id = rowData.id;
                this.$router.push({name: 'show.mahasiswa', params: {id}})
            },
            editRow(rowData) {
                let id = rowData.id;
                this.$router.push({name: 'edit.mahasiswa', params: {id}})
            },
            deleteRow(rowData){
                this.deleteInfo = rowData;
            },
            deleteMahasiswa() {
                this.$http.delete(apiUrl() + '/mahasiswa/' + this.deleteInfo.id)
                    .then(function(res){
                        window.localStorage.setItem('success', JSON.stringify([
                                                                          'Mahasiswa telah dihapus'
                                                                          ]));
                        window.location.assign(window.location.href);
                    })
                    .catch(function(res){
                        
                    });
            }
        }
    }
</script>
<style type="text/css">
    .pagination > a {
        border: 1px solid #eee;
        padding: 13px;
        display: inline-block;
        cursor: pointer;
    }
    .pagination > a:hover,
    .pagination .active {
        background: #eee;
    }
    .pagination .disabled {
        pointer-events: none;
        cursor: disabled;
    }
</style>
