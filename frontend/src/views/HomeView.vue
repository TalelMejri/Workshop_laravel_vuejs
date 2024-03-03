<template>
  <div class="home">
    <div class="container m-4">
      <form @submit.prevent="AddTodo()" class="mb-2" v-if="!edit">
         <h2>Add Todo</h2>
          <div class="mb-2">
              <input type="text" v-model="title" placeholder="title" class="form-control">
          </div>
          <div>
              <input type="text" v-model="description" placeholder="description" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Add Todo</button>
      </form>
      <form @submit.prevent="UpdateTodo()" class="mb-2" v-else>
         <h2>Update Todo</h2>
          <div class="mb-2">
              <input type="text" v-model="title" placeholder="title" class="form-control">
          </div>
          <div>
              <input type="text" v-model="description" placeholder="description" class="form-control">
          </div>
          <button type="submit" class="btn btn-warning">Update Todo</button>
          <button type="submit" class="btn btn-secondary" @click="refresh()">refresh</button>
      </form>
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>title</th>
            <th>description</th>
            <th>Operation</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="todo in Todos" :key="todo.id">
            <td>{{ todo.id }}</td>
            <td>{{ todo.title }}</td>
            <td>{{ todo.description }}</td>
            <td class="d-flex">
               <button class="btn btn-danger" @click="DeleteTodo(todo.id)">Delete</button>
               <button class="btn btn-warning" @click="editTodo(todo.id)">Update</button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import TodoService from '@/service/TodoService';
export default {
  name: 'HomeView',
  created() {
    this.getTodos();
  },
  data() {
    return {
      Todos: [],
      TodoId:null,
      edit:false,
      title:"",
      description:""
    }
  },
  methods: {
    getTodos() {
      TodoService.getTodo().then((res)=>{
         this.Todos=res.data.data;
      })
    },
    DeleteTodo(id){
      TodoService.deleteTodo(id).then((res)=>{
          this.getTodos();
      })
    },
    AddTodo(){
      TodoService.AddTodo(
        {
          title:this.title,
          desc:this.description
        }
      ).then((res)=>{
         this.getTodos();
      })
    },
    editTodo(id){
      this.TodoId=id;
      this.edit=true;
      TodoService.GetTodoById(id).then((res)=>{
         this.title=res.data.data.title;
         this.description=res.data.data.description;
      })
    },
    UpdateTodo(){
      TodoService.UpdateTodo(
        {
          title:this.title,
          desc:this.description
        },
        this.TodoId
      ).then((res)=>{
         this.getTodos();
      })
    },
    refresh(){
      this.TodoId=null;
      this.edit=false;
    }
  }
}
</script>
