// // // // // // // // // // let  arr=[19, 78, 13, 11, 7, 83 ,16];
// // // // // // // // // // let  aar2= arr.map(maping=>maping*maping);
// // // // // // // // // // console.log(aar2);
// // // // // // // // // // let sorting=()=>aar2.sort((a, b) => a - b);
// // // // // // // // // // console.log(sorting(aar2))
// // // // // // // // // // let MAX=()=>Math.max.apply(null,aar2)
// // // // // // // // // // console.log(MAX())
// // // // // // // // // // // Original array of objects
// // // // // // // // // // var arr6 = [
// // // // // // // // // //   { value: 10 },
// // // // // // // // // //   { value: 2 },
// // // // // // // // // //   { value: 1 },
// // // // // // // // // //   { value: 8 },
// // // // // // // // // //   { value: 50 }
// // // // // // // // // // ];


// // // // // // // // // // var arr7= arr6.map(obj => {
// // // // // // // // // //   obj.value = obj.value + obj.value * 0.1;
// // // // // // // // // //   return obj;
// // // // // // // // // // });


// // // // // // // // // // console.log( arr6);
// // // // // // // // // // console.log( arr7);
// // // // // // // // // //    x=arr6.map(obj=>obj.value);
// // // // // // // // // // Math.max.apply(null,x)
// // // // // // // // // // console.log(Math.max(...x));
// // // // // // // // // let arr = [19, 78, 13, 11, 7, 83, 16];
// // // // // // // // // let arrS = arr.map(value => value * 0.1 + value); let sortedArray = arrS.sort((a, b) => a - b); let maxS = Math.max(...arrS);

// // // // // // // // // console.log(arrS, sortedArray, maxS);
// // // // // // // // // **************MAX code ******************
// // // // // // // // console.log(Math.max(...[87,43,21,29].map(a=>a*1.1)));
// // // // // // // // // **************MAX code ******************
// // // // // // // // // let a = {items: };
// // // // // // // // // a.items.map(item => item.price *= 1.1);
// // // // // // // // // console.log(a.items.map(item => item.price = item.price *0.1+ item.price),a);
// // // // // // // // // console.log(a.items.map(item =>(item.price *= 1.1)));
// // // // // // // // // console.log (a)
// // // // // const a = [{ 
// // // // //     id: 1,
// // // // //    title: 'Ali',
// // // // //     price: 10 
// // // // // },
// // // // // { 
// // // // //     id: 2, 
// // // // //    title: 'Umar',
// // // // //     price: 20 
// // // // // },
// // // // // {    id: 3,
// // // // //     title: 'Akbar', 
// // // // //      price: 30 }
// // // // // ]
// // // // // console.log( a.map(({...a,price  })=>({price:price*1.1})))
// // // // console.log(
// // // //     [
// // // //       { id: 1, name: 'Ali', price: 10 },
// // // //       { id: 2, name: 'Umar', price: 20 },
// // // //       { id: 3, name: 'Akbar', price: 30 }
// // // //     ].map(item => ({ ...item, price: item.price * 1.1 }))
// // // //   );
// // // // // // //   console.log( typeof ([
// // // // // // //     { id: 1, name: 'Ali', price: 10 },
// // // // // // //     { id: 2, name: 'Umar', price: 20 },
// // // // // // //     { id: 3, name: 'Akbar', price: 30 }
// // // // // // //   ]))
// // // // // // //   typeof(item())
// // // // // // // 4+4= 8
// // // // // // // 2*4=8
// // // // // // // 12-4 =8
// // // // // // // let x= 8+4*6;
// // // // // // // console.log(x)
// // // // // // // let arr=[
// // // // // // // {id:1,name :'Aryan',order:   323},
// // // // // // // {id:1,name :'ali',order:   324},
// // // // // // // {id:1,name :'Akbar',order:   325},
// // // // // // // {id:1,name :'A',order:   326}
// // // // // // // ]

// // // // // // // let 
// // // // // const arr1 = { 0: "a", 1: "b", 2: "c" };

// // // // // const arr2 = [];
// // // // // Object.keys(arr1).map(key => arr2.push(arr1[key]));

// // // // // console.log(arr2);
// // // // let  arr=[1,6,8,4[1,5,9],4];
// // // // let  x=arr.map(element=>element*1.1)
// // // // console.log(x);
// // // let arr=[23,65,12,64] // original 
// // // let  y  = JSON.parse(JSON.stringify(arr))// deep copy  
// // // let  d  = y.pop ();
// // // // let x=arr.slice(2);// copy   with action  
// // // // let   c  = x.unshift(34);
// // // console.log(arr)
// // // console.log(y)
// // // console.log(d)


// // // // shallow  copy  means  original ma bhi  change  ho

// // let arr = [23, 45, 78, 34];

// // // Shallow copy using the spread operator
// // let arrCopy = JSON.parse(JSON.stringify(arr));


// // // Perform unshift on the copy
// // arrCopy.unshift(10, 20, 30);

// // // Log the original and modified arrays
// // console.log("Original Array:", arr);
// // console.log("Modified Array:", arrCopy);
// // const  arr = [45,78,23,89];
// // arr[0] = 99;
// // console.log(arr)
// // let  arr=[45,87,34]
// // arr.push([6,8,3])
// // let  x  = [...arr]
// // x[3][]=x.push(56)
// // // x[3]=89;
// // console.log(arr)
// // console.log(x)
// let  ar = [56,76,89,[76,34]]
// // shallow copy s
// let  ar1= [...ar]
// // ar1[2]=ar1.push([90,34,23])

// ar1[3][0]=67
// console.log(ar)
// console.log(ar1)

// let  arr2=[...arr]
// let arr=[1,2,3];
// arr = arr.map(x => x + 2)
// // let  x = arr3.push([23,9])
// console.log(arr)
let arr=[1,2,3].map(x=>x+4545474457)
console.log(arr)
arr =[2,56,87]
