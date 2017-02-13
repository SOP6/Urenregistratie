
@extends('master')
@section('content')
    <div class="form-group row add">
        <div class="well" style="width:150%;">
            <div class="row">
        <div class="col-md-12">
            <h1>Manage Logs</h1>
        </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <th>Work description</th>
                    <th>Hours</th>
                </tr>
                <tr v-for="item in items">
                    <td>@{{ item.work_description }}</td>
                    <td>@{{ item.hours}}</td>
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
                    Log new hours
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
    <!-- Log hours Modal -->
    <div class="modal fade" id="create-item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" id="myModalLabel">Log Hours</h4>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent="createItem">
                        <div class="form-group">
                            <label for="work_description">work description</label>
                            <input type="text" name="work_description" class="form-control" v-model="newItem.work_description" />
                            <span v-if="formErrors['work_description']" class="error text-danger">
                @{{ formErrors['work_description'] }}
              </span>
                        </div>
                        <div class="form-group">
                            <label for="hours">Amount(hours)</label>
                            <textarea name="hours" class="form-control" v-model="newItem.hours">
              </textarea>
                            <span v-if="formErrors['hours']" class="error text-danger">
                @{{ formErrors['hours'] }}
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
                    <h4 class="modal-title" id="myModalLabel">Edit Users</h4>
                </div>
                <div class="modal-body">
                    <form method="post" enctype="multipart/form-data" v-on:submit.prevent="updateItem(fillItem)">
                        <div class="form-group">
                            <label for="work_description">work description</label>
                            <input type="text" name="work_description" class="form-control" v-model="fillItem.work_description" />
                            <span v-if="formErrors['work_description']" class="error text-danger">
                @{{ formErrors['work_description'] }}
              </span>
                        </div>
                        <div class="form-group">
                            <label for="hours">Amount(hours)</label>
                            <textarea name="hours" class="form-control" v-model="fillItem.hours">
              </textarea>
                            <span v-if="formErrors['hours']" class="error text-danger">
                @{{ formErrors['hours'] }}
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
    <script type="text/javascript" src="/js/logsVue.js"></script>

@stop