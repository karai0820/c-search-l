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
    </select>
    <input type="button" class="btn btn-primary " @click="Stock"  value="Editor→Stock">
    <input type="button" class="btn btn-primary " @click="BackEditor"  value="Stock→Editor">

    <!--構造ストックボックス-->
   <div id="stockbox" class="col-md-3" >
        <div class="col-md-3" >
          <div id="jsme_container2">Stockbox No.1</div>
        </div>
        <div class="col-md-3">
         <div id="jsme_container3">Stockbox No.2</div>
        </div>
        <div class="col-md-3">
          <div id="jsme_container4">Stockbox No.3</div>
        </div>
    </div> 
  </form>
  
<form class="searchform" @submit.prevent="Search">
    <div lass="form-layout">
      <ul class="form-content">
          <li>
            <label class="col-md-12" for="compound_name">化合物名/L-No.</label>
        		<input type ='text' class ="form-control" name="compound_name" v-model="compounds.compound_name">
          </li>
          <li>
        	<label class="col-md-12" for="created_at">登録年月日</label>
        		<input type ='date' class ="form-control" name="created_at" v-model="compounds.date">
          </li>
          <li>
          <label class="col-md-12" for="chemist">合成者</label>
            <input type ='text' class ="form-control" name="chemist" v-model="compounds.chemist">
          </li>
    </ul>
   </div>
   
   <div id="search-area"></div>
   <button type='submit' >Search</button>
   
   <!--
   <button v-on:click='SearchReset' >SearchReset</button>
    -->

  	</form>
    <div id="hit-num"></div>
    <List v-for="(compound,key) in compounds" :key="key" :searchData="compound"></List>
    
    
</div>
</div>
</div>
</main>
</template>

<script>
import List from "./list.vue";
export default {
name:"search",
components:{
  List
},
  data() {
    return {
    compounds:[
    {id:'',compound_name:'',structure:'',chemist:'',created_at:'',updated_at:''}
    ],
    saved:false,
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
    CompleteSearch(){//完全一致検索(SMILES)
        this.compounds.structure = jsmeApplet1.smiles();
        const search = this.compounds;//検索用レコード取得      
        axios.get('/api/compounds')//apiからデータ取得
        .then((res)=>{
          const targetText = res.data.data;//DBデータ取得
          const targetLists = targetText.filter(function(element){//完全一致OR検索
                              return element.compound_name === search.compound_name || element.chemist === search.chemist || element.structure.indexOf(search.structure) === 0; 
                               });
          if(targetLists != '' && this.saved == false){//一致データがない場合には返り値なしで終了
          for(var i=0;i<targetLists.length;i++){
            this.compounds.push(targetLists[i]); 
          }
            this.saved =true;
            this.compounds.shift();//検索用レコードを削除
            //検索件数表示
            let hitNum = document.querySelector('#hit-num');
            let searchCount = this.compounds.length;
            hitNum.textContent ='検索結果:'+searchCount+'件';
          }else{
            alert('一致する化合物はありません');
          
          alert(JSON.stringify(this.compounds));

          //検索件数表示
          let hitNum = document.querySelector('#hit-num');
          let searchCount = this.compounds.length-1;
          hitNum.textContent ='検索結果:'+searchCount+'件';
          }
        });
      },
      Search(){//部分一致検索(SMILES)->検索漏れあり
        this.compounds.structure = jsmeApplet1.smiles();
        const search = this.compounds;//検索用レコード取得     
        axios.get('/api/compounds')//apiからデータ取得
        .then((res)=>{
          const targetText = res.data.data;//DBデータ取得
          const targetLists = targetText.filter(function(element){//部分一致OR検索
                              return element.compound_name.indexOf(search.compound_name) >-1 || element.chemist.indexOf(search.chemist) > -1 || element.structure.indexOf(search.structure) >-1 ; 
                               });
          if(targetLists != '' && this.saved == false){//一致データがない場合には返り値なしで終了
          for(var i=0;i<targetLists.length;i++){
            this.compounds.push(targetLists[i]); 
          }
            this.saved =true;
            this.compounds.shift();//検索用レコードを削除
            //検索件数表示
            let hitNum = document.querySelector('#hit-num');
            let searchCount = this.compounds.length;
            hitNum.textContent ='検索結果:'+searchCount+'件';
          }else{
            alert('一致する化合物はありません');
          
          alert(JSON.stringify(this.compounds));

          //検索件数表示
          let hitNum = document.querySelector('#hit-num');
          let searchCount = this.compounds.length-1;
          hitNum.textContent ='検索結果:'+searchCount+'件';
          }
        });
      },
      MolSearch(){//部分一致検索(MOL)→完全一致検索になってしまう。
        let structure = jsmeApplet1.molFile();
        let array = structure.split('\n');
        array.shift();
        array.shift();
        array.shift();
        array.pop();
        array.pop();
        this.compounds.structure = array.join('\n');
        alert(JSON.stringify(this.compounds.structure));//valueが表示されない？
        const search = this.compounds;//検索用レコード取得    
        axios.get('/api/compounds')//apiからデータ取得
        .then((res)=>{
          const targetText = res.data.data;//DBデータ取得
          const targetLists = targetText.filter(function(element){//部分一致OR検索
                              return element.compound_name.indexOf(search.compound_name) > -1 || element.chemist.indexOf(search.chemist) > -1 || element.structure.indexOf(search.structure) > -1 ; 
                               });
          if(targetLists != '' && this.saved == false){//一致データがない場合には返り値なしで終了
          for(var i=0;i<targetLists.length;i++){
            this.compounds.push(targetLists[i]); 
          }
            this.saved =true;
            this.compounds.shift();//検索用レコードを削除
            //検索件数表示
            let hitNum = document.querySelector('#hit-num');
            let searchCount = this.compounds.length;
            hitNum.textContent ='検索結果:'+searchCount+'件';
          }else{
            alert('一致する化合物はありません');
          
          //alert(JSON.stringify(this.compounds));

          //検索件数表示
          let hitNum = document.querySelector('#hit-num');
          let searchCount = this.compounds.length-1;
          hitNum.textContent ='検索結果:'+searchCount+'件';
          }
        });
      },

      SearchReset(){
        this.compounds.id = '';
        this.compounds.compound_name='';
        this.compounds.structure='';
        this.compounds.chemist='';
        this.compounds.created_at='';
        this.compounds.updated_at='';
        this.saved = false;

      },
      Jsme(){
        let jsme = document.createElement('div');
        for(var i=1;i<6;i++){
          jsme.setAttribute('id',eval("jsme_container"+[i+1]));
          jsme.textContent = eval("Stockbox No."+i);
          document.getElementById('stockbox').appendChild(jsme);
      };
      
    },
        //フォーム入力による自動件数表示
        //return this.searchData.length-1;//無限ループ
        //const list = document.querySelector('#list');
          //const element = document.createElement("List") 
          //element.setAttribute('v-for','searchdata as this.searchData');
          //element.setAttribute('v-bind:searchData','searchdata');
          //list.appendChild(element);
    //}
    //}
}
}


</script>  
