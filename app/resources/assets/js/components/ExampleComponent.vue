<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Add player</div>
                    <form>
                            <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputName" placeholder="Name">
                            </div>
                            </div>
                           
                            <fieldset class="form-group">
                            <div class="row">
                                <legend class="col-form-label col-sm-2 pt-0">Level</legend>
                                <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="rookie" checked>
                                    <label class="form-check-label" for="gridRadios1">
                                    rookie
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="amateur">
                                    <label class="form-check-label" for="gridRadios2">
                                    amateur
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios3" value="pro">
                                    <label class="form-check-label" for="gridRadios3">
                                    pro
                                    </label>
                                </div>
                                </div>
                            </div>
                            </fieldset>

                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Score</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Score">
                                </div>
                                </div>                        
                            <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add player</button>
                            </div>
                            </div>
                            
                        </form>
                         <b-table striped hover :players="players"></b-table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.');
            this.fetchData();
        },

        data () {
            return {
                players: []
            }       
        },
        methods: {
            fetchData(){
                const t = this;
                axios.get('api/players')
                    .then(({data}) => {
                        t.players = data;
                    })
                    .catch((err) => {
                        console.log(err)
                    })
            },

            fetch(){
                this.fetchData();
            },

            create(){
                const t = this;
                axios.post('api/comments', t.data)
                    .then(({data}) => {
                        // t.comments.unshift(data);
                        this.data.content = '';
                        this.fetchData()
                    })
                    .catch((err)=>{
                        console.log(err)
                    })
            }, 
            
        }
    }
</script>
