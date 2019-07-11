<!--構造検索ページ-->
<template>
 <main role="main">
 
 	<div class="container">
 		<h1 class="jumbotron-heading">Structure Search</h1>

  	<div class="row">
  	<div class="col-md-12 mx-auto">
    <!--jsme-->
    <div id="jsme_container1"></div>

    <!--構造Stock機能-->
    <form name="select">
    <select name="selectbox">
    <option>1</option>
    <option>2</option>
    <option>3</option>
    <option>4</option>
    </select>
    <input type="button" class="btn btn-primary " @click="Stock"  value="Editor→Stock">
    <input type="button" class="btn btn-primary " @click="BackEditor"  value="Stock→Editor">

    <!--構造ストックボックス-->
   <div class="stockbox">
        <div class="col-md-3" >
          <div id="jsme_container2">Stockbox No.1</div>
        </div>
        <div class="col-md-3">
         <div id="jsme_container3">Stockbox No.2</div>
        </div>
        <div class="col-md-3">
          <div id="jsme_container4">Stockbox No.3</div>
        </div>
        <div class="col-md-3">
         <div id="jsme_container5">Stockbox No.4</div>
        </div>
    </div>      
  </form>
  
<form class="searchform" @submit.prevent="" >
    <div lass="form-layout">
      <ul class="form-content">
          <li>
            <label class="col-md-12" for="compound_name">化合物名/L-No.</label>
        		<input type ='text' class ="form-control" name="compound_name" v-model="compound_name">
          </li>
          <li>
        	<label class="col-md-12" for="created_at">登録年月日</label>
        		<input type ='text' class ="form-control" name="created_at" v-model="date">
          </li>
          <li>
          <label class="col-md-12" for="author">作成者</label>
            <input type ='text' class ="form-control" name="author" v-model="author">
          </li>
    </ul>
   </div>
   <button type='submit' class="">Search</button>


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
      structure:'',
      compound_name:'',
      date:'',
      author:'',

     
      }
    
  },
  methods: {
    Stock(){
      const optionNum = document.select.selectbox.selectedIndex;
      const jme = jsmeApplet1.molFile();
      alert("Stockbox No."+[optionNum+1]+"に保管します");
      eval("jsmeApplet"+[optionNum+2]).readMolFile(jme);
  },
    BackEditor(){
      const optionNum = document.select.selectbox.selectedIndex;
      const jme = eval("jsmeApplet"+[optionNum+2]).molFile();
      alert("Editorに移動します");
      jsmeApplet1.readMolFile(jme);
                },
    Search(){
      axios.get('/api/compounds').then((res)=>{//検索処理を考える
        if(this.structure == res.data.data.structure){
          save;
        }
        this.compound_name = res.data.data.compound_name;
        this.date = res.data.data.date;
        this.author = res.data.data.author;
      });
      

    }            


  }
}

</script>  
