/登録ページ
<template>
 <main role="main">
    <div class="container">
        <h1 class="jumbotron-heading">Edit</h1>
    <div class="row">
    <div class="col-md-12 mx-auto">
    
    //入力フォーム
    <form class="searchform" v-on:submit.prevent="edit()">
    
    //構造入力
    <div id="jsme_container1"></div>
    //パラメータ入力    
    <ul class="form-content">
          <li>
            <label class="col-md-12" for="compound_name">化合物名/L-No.</label>
            <input type ='text' class ="form-control" name="compound_name" v-model="data.compound_name" required>
          </li>
          <li>
          <label for="chemist">合成担当者</label>
            <input type ='text' class ="form-control" name="chemist" v-model="data.chemist">
          </li>
    </ul>

    //登録ボタン
    <button type="submit" class="button button--inverse">register</button>
  </form>
    <button v-on:click="dataDelete()" class="button button--inverse">delete</button>
　　
<!--{{$route.params.name}}-->
{{data}}sss

  </div>
  </div>
  </div>
</main>
</template>

<script>
export default {
  name:'edit',
    data() {
        return {
          data:{
            id:'',
            compound_name:'',
            structure:'',
            chemist:'',
            updated_at:'',
            created_at:''
          },
            saved: false,
            
        }
    },
    mounted(){
    this.$nextTick(()=>{this.getSession();}); 
    this.$nextTick(()=>{this.Jsme();}); 
    },
    updated(){
        
      
    
    },
    methods: {
        edit() {
            this.data.structure = jsmeApplet1.molFile();
            var params = new URLSearchParams();
            params.append('id',this.data.id);
            params.append('compound_name',this.data.compound_name);
            params.append('structure',this.data.structure); 
            params.append('chemist',this.data.chemist);

            axios.put('/api/compounds/'+ this.data.id,params)
            .then((res) => {
               alert('修正しました');
                }) 
            .catch(error => {
                console.log(error);
                
            });
        },
        dataDelete(){
          axios.delete('/api/compounds/'+ this.data.id)
            .then((res) => {
               alert('削除しました');
                }) 
            .catch(error => {
                console.log(error);}
                );
        },
      getSession(){
            this.data = JSON.parse(sessionStorage.getItem('arr'));
          },
      Jsme(){
        jsmeApplet1 = new JSApplet.JSME("jsme_container1", "380px", "340px");
        let mol = this.data.structure;
        jsmeApplet1.readMolFile(mol);
      },

    }
  }
</script>
