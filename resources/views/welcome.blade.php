@extends('layout.master')

@section('body')

    <div id="app" style="padding-left: 350px">
        <div>
            <a href="{{route('import.show')}}" class="btn btn-success">Import</a>
            <a href="{{route('send.show')}}" class="btn btn-primary">Request Email</a>
        </div>
        <div class="row" style="text-align: center;margin:10px;">
            <img src="/images/phone-book-icon.jpg" class="img-circle" height="200" width="200">
            <h1>Daleel Alkifah</h1>
            <form class="form-inline">
                <input type="search" placeholder="Search By Name Or Company" v-model="name">
            </form>
        </div>
        <div>

            <table class="table table-hover">
                <thead>
                <tr class="bg-primary">
                    <td class="col-md-4">Name</td>
                    <td class="col-md-4">Extension</td>
                    <td class="col-md-4">Company</td>
                    <td class="col-md-4">Department</td>
                </tr>
                </thead>
                <tbody>
                <tr v-for="item in filteredByName">
                    <td>@{{item.name}}</td>
                    <td>@{{item.extension}}</td>
                    <td>@{{item.company}}</td>
                    <td>@{{item.department}}</td>
                </tr>
                </tbody>
            </table>
        </div>

    </div>

@endsection

@section('scripts')
    <script src="https://unpkg.com/vuejs-paginate@0.9.0"></script>

    <script>
        Vue.component('paginate', VuejsPaginate)

       new Vue({
           el:'#app',
            data(){
                return {
                    items: [],
                    name: '',
                    paginate: ['employees']
                };

            },
            methods: {
                getEmployees(){
                    $.ajax({
                        url: '/all-employees', dataType: 'json',
                        type: 'GET',

                    }).done((data) => {
                        this.items = data;
                    });


                },
                clickCallback: function(pageNum) {
                    console.log(pageNum)
                }

            },
            computed: {
                filteredByName(){
                    if (this.name == '') {
                        return this.items
                    }
                    return this.items.filter((item) => {
                        return item.name.toLowerCase().indexOf(this.name.toLowerCase()) != -1 ||
                            item.company.toLowerCase().indexOf(this.name.toLowerCase()) != -1;
                    });
                }
            },

            created(){
                this.getEmployees();
            }
        })
    </script>
@endsection
