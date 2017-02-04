
@extends('master')
@section('content')
    <div class="form-group row add">
        <div class="col-md-12">
            <h1>@{{ items }}</h1>
        </div>
        <div class="col-md-12">
            <button type="button" data-toggle="modal" data-target="#create-item" class="btn btn-primary">
                Create New User
            </button>
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
    <!-- Create Item Modal -->
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
                            <label for="first_name">Title:</label>
                            <input type="text" name="first_name" class="form-control" v-model="newItem.title" />
                            <span v-if="formErrors['first_name']" class="error text-danger">
                @{{ formErrors['first_name'] }}
              </span>
                        </div>
                        <div class="form-group">
                            <label for="first_name">Description:</label>
                            <textarea name="last_name" class="form-control" v-model="newItem.description">
              </textarea>
                            <span v-if="formErrors['last_name']" class="error text-danger">
                @{{ formErrors['last_name'] }}
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
    <!-- Edit Item Modal -->
    <div class="modal fade" id="edit-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Edit Blog Post</h4>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem.id)">
                        <div class="form-group">
                            <label for="first_name">Title:</label>
                            <input type="text" name="first_name" class="form-control" v-model="fillItem.title" />
                            <span v-if="formErrorsUpdate['first_name']" class="error text-danger">
              @{{ formErrorsUpdate['first_name'] }}
            </span>
                        </div>
                        <div class="form-group">
                            <label for="first_name">Description:</label>
                            <textarea name="last_name" class="form-control" v-model="fillItem.description">
            </textarea>
                            <span v-if="formErrorsUpdate['last_name']" class="error text-danger">
              @{{ formErrorsUpdate['last_name'] }}
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