
import "../plugins/axios"
import axios from "axios"

export default {

    getTodo(){
        return axios.get("/todos");
    },

    deleteTodo(id){
        return axios.delete("/DeleteTodo/"+id);
    },

    AddTodo(data){
        return axios.post("/AddTodo",data);
    },

    GetTodoById(id){
        return axios.get("/GetTodoById/"+id);
    },

    UpdateTodo(data,id){
        return axios.put("/UpdateTodo/"+id,data);
    }
}