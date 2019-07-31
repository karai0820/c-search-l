//登録ページ
<template>
 <main role="main">
    <div class="container">
        <h1 class="jumbotron-heading">Structure Registry</h1>
    <div class="row">
    <div class="col-md-12 mx-auto">
    
    //入力フォーム
    <form class="searchform" v-on:submit.prevent="create">
    
    //構造入力
    <div id="jsme_container1"></div>
    //パラメータ入力    
    <ul class="form-content">
          <li>
            <label class="col-md-12" for="compound_name">化合物名/L-No.</label>
            <input type ='text' class ="form-control" name="compound_name" v-model="compound_name">
          </li>
          <li>
          <label for="chemist">合成担当者</label>
            <input type ='text' class ="form-control" name="chemist" v-model="chemist">
          </li>
    </ul>

    //登録ボタン
    <button type="submit" class="button button--inverse">register</button>
　　</form>


  </div>
  </div>
  </div>
</main>
</template>

<script>
export default {
    data() {
        return {
            saved: false,
            compound_name:'',
            structure:'',
            chemist:'',
        }
    },
    methods: {
        create() {
            this.structure = jsmeApplet1.molFile();
            alert(this.structure);
            alert(this.chemist);
            alert(this.compound_name);

            var params = new URLSearchParams();
            params.append('compound_name',this.compound_name);
            params.append('structure',this.structure); 
            params.append('chemist',this.chemist);
            
            axios.post('/api/compounds',params)
            .then((res) => {
                this.compound_name = '';
                this.structure ='';
                this.chemist = '';
                this.saved = true;
                }) 
            .catch(error => {
                console.log(error)
                
            });
        }
    },
    }
</script>
```