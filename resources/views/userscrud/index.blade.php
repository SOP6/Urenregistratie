
@extends('master')
@section('content')

    <div class="form-group row add">
        <div class="well" style="width:150%;">
            <div class="row">
            <div class="col-md-12">
                <h1>Manage Users</h1>
            </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                </tr>
                <tr v-for="item in items">
                    <td>@{{ item.first_name }}</td>
                    <td>@{{ item.last_name }}</td>
                    <td>@{{ item.email }}</td>
                    <td>
                        <button class="edit-modal btn btn-warning" @click.prevent="editItem(item)">
                            <span class="glyphicon glyphicon-edit"></span> Edit
                        </button>
                        <button class="edit-modal btn btn-danger" @click.prevent="deleteItem(item)">
                            <span class="glyphicon glyphicon-trash"></span> Delete
                        </button>
                    </td>
                </tr>
            </table>
            <div class="col-md-12">
                <button type="button" data-toggle="modal" data-target="#create-item" class="btn btn-primary">
                    Create New User
                </button>
            </div>
        </div>
    </div>
    <nav>
        <ul class="pagination">
            <li v-if="pagination.current_page > 1">
                <a href="#" aria-label="Previous" @click.prevent="changePage(pagination.current_page - 1)">
                    <span aria-hidden="true">«</span>
                </a>
            </li>
            <li v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '']">
                <a href="#" @click.prevent="changePage(page)">
                    @{{ page }}
                </a>
            </li>
            <li v-if="pagination.current_page < pagination.last_page">
                <a href="#" aria-label="Next" @click.prevent="changePage(pagination.current_page + 1)">
                    <span aria-hidden="true">»</span>
                </a>
            </li>
        </ul>
    </nav>
    <!-- Create User Modal -->
    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Create New Post</h4>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                        <div class="form-group">
                            <label for="first_name">First name:</label>
                            <input type="text" name="first_name" class="form-control" v-model="newItem.first_name" />
                            <span v-if="formErrors['first_name']" class="error text-danger">
                @{{ formErrors['first_name'] }}
              </span>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Last name:</label>
                            <textarea name="last_name" class="form-control" v-model="newItem.last_name">
              </textarea>
                            <span v-if="formErrors['last_name']" class="error text-danger">
                @{{ formErrors['last_name'] }}
              </span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <textarea name="email" class="form-control" v-model="newItem.email">
              </textarea>
                            <span v-if="formErrors['email']" class="error text-danger">
                @{{ formErrors['email'] }}
              </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Edit User Modal -->
    <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Edit Users</h4>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem)">
                        <div class="form-group">
                            <label for="first_name">first name:</label>
                            <input type="text" name="first_name" class="form-control" v-model="fillItem.first_name" />
                            <span v-if="formErrorsUpdate['first_name']" class="error text-danger">
              @{{ formErrorsUpdate['first_name'] }}
            </span>
                        </div>
                        <div class="form-group">
                            <label for="last_name">last names:</label>
                            <textarea name="last_name" class="form-control" v-model="fillItem.last_name">
            </textarea>
                            <span v-if="formErrorsUpdate['last_name']" class="error text-danger">
              @{{ formErrorsUpdate['last_name'] }}
            </span>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <textarea name="email" class="form-control" v-model="fillItem.email">
            </textarea>
                            <span v-if="formErrorsUpdate['email']" class="error text-danger">
              @{{ formErrorsUpdate['email'] }}
            </span>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@stop

@section('includes')
    <script type="text/javascript" src="/js/userVue.js"></script>

@stop