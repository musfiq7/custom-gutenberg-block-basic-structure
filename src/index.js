const {registerBlockType} = wp.blocks;
console.log(wp);


registerBlockType('custom-block/first-block',{
    title:'custom block',
    description:'it is a description',
    icon:'beer',
    category:'Mycategory', //this is my custom category made in php file
    
    attributes:{
      company:{type:'string'},
    //   email:{string},
    //   address:{string}
    
    },

    edit:(props)=> {

        const {attributes, setAttributes} = props;
        console.log(props);

       const updateInfo = (e)=>{
            setAttributes({company:e.target.value})
        }
        
        return(
            <div style={{width:'500px', height:'400px',padding:'20px', background:'rebeccapurple'}}>
            <input type="text" value={attributes.company} onChange={updateInfo} />
          
           
            </div>
        )
    },
    save:(props)=> {
        
       
        const {attributes, setAttributes} = props;
        return(
            <div style={{width:'400px', height:'200px',padding:'20px', background:'coral', borderRadius:'5px'}}>
              <h1>Company Name: {attributes.company}</h1>
             
            </div>
        )
    }
});