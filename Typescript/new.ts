module Aviation{
let x = 1513;
var x:string ="Hello";
console.log(x);
interface IMachine{
	type:string;
}

class Position{
	constructor(publiс x:number, public y:number, public z:number){

	};
};
class FlyingObject implements IMachine{
	type:string;
	type='zorro';
	velocity:number = 0;
	constructor(public velocity:number = 0){

	}
}
	export class UFO extends FlyingObject {
		
		constructor() {
			super(Number.POSITIVE_INFINITY)
		}
	}
}