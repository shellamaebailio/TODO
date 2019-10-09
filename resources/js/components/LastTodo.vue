<template>

    <div class="container shella-container">
        <div class="row">
            
            <div class="col-sm-12">

                <div v-for="(todo) in todos" v-bind:key="todo.id" v-bind:title="todo.task" class="funkyradio">
                      <div class="funkyradio-default">
                            <input v-if="todo.Completed == true" v-bind="checking" :value="todo.id" @click="checkFunction(todo.id)" type="checkbox" name="checkbox" :id="todo.id" checked/>
                            <input v-else v-bind="checking" :value="todo.id" @click="checkFunction(todo.id)" type="checkbox" name="checkbox" :id="todo.id"/>
                            <label class="strikethrough" :for="todo.id">{{todo.task}}</label>
                            <button @click="editTask(todo.task, todo.id)" type="button" class="btn btn-success edit_btn">Edit</button>
                            <button @click="deleteTask(todo.id)" type="button" class="btn btn-danger edit_btn">Del</button>
                        </div>
                </div>
                <br>
                <form v-on:submit.prevent = "addNewTask">

                    <div class="input-group mb-3">
                      <input v-model="taskname" id="taskInput" type="text" name="task" class="input-task form-control" placeholder="Add new todo" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        
                      <div class="input-group-append">
                        <button v-if="this.isEdit == false" type="submit" class="btn btn-secondary">Save</button>
                        <button v-else type="button" @click="updateTask" class="btn btn-success">Update</button>
                      </div>
                    </div>
                    <span v-if="validationError.task" class="error">{{validationError.task[0]}}</span>
                </form>
            </div>

        </div>
    </div>
</template> 
 
<script>
import { log } from 'util';

    export default{
        data(){
            return{
                todos:[],
                id:'',
                taskname:'',
                isEdit:false,
                completedval: 0,
                checking: '',
                val_checked: 0,
                validationError: []
            }
        },
        mounted(){
            this.getTasks()
        },
        methods:{
            getTasks(){
                axios({method: 'GET', url: '/api/lasttodos'}).then(
                    result => {
                        console.log(result.data);
                        this.todos = result.data
                    },
                    error => {
                        console.error(error)
                    }
                )
            },
            addNewTask(){
                this.validationError = []
                axios.post('/api/lasttodos',{task: this.taskname, Completed: 0}).then(res => {
                    this.taskname = ''
                    this.getTasks()
                    console.log(res) 
                })
                .catch(err => {
                    if(err.response.status = 422){
                        this.validationError = err.response.data.errors
                    }
                })
                console.log('heyyy' + this.validationError.task);
            },
            editTask(title, id){
                this.id = id
                this.taskname = title
                this.isEdit = true
            },
            updateTask(){
                axios.put('/api/lasttodos/'+this.id,
                {task: this.taskname})
                .then(res => {
                    this.taskname = ''
                    this.isEdit = false
                    this.getTasks()
                    console.log(res)
                })
                .catch(err => {
                    console.log(err)
                })
            },
            deleteTask(id){
                console.log(id);
                axios.delete('/api/lasttodos/'+id)
                .then(res => {
                    this.taskname = ''
                    this.getTasks()
                    console.log(res)
                })
                .catch(err => {
                    console.log(err)
                })
            },
            checkFunction(id){
                console.log(document.getElementById(id).checked);
                if(document.getElementById(id).checked){
                    this.val_checked = 1;
                }else{
                    this.val_checked = 0;
                }

                axios.put('/api/lasttodos/'+id,
                {Completed: this.val_checked})
                .then(res => {
                    this.getTasks()
                    this.getTasks()
                    console.log(res)
                })
                .catch(err => {
                    console.log(err)
                })

            }
        }
    }

</script> 