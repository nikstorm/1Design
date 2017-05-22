var __extends = (this && this.__extends) || (function () {
    var extendStatics = Object.setPrototypeOf ||
        ({ __proto__: [] } instanceof Array && function (d, b) { d.__proto__ = b; }) ||
        function (d, b) { for (var p in b) if (b.hasOwnProperty(p)) d[p] = b[p]; };
    return function (d, b) {
        extendStatics(d, b);
        function __() { this.constructor = d; }
        d.prototype = b === null ? Object.create(b) : (__.prototype = b.prototype, new __());
    };
})();
var Aviation;
(function (Aviation) {
    var x = 1513;
    var x = "Hello";
    console.log(x);
    var Position = (function () {
        function Position(publiс, number, y, z) {
            if (publiс === void 0) { publiс = x; }
            this.y = y;
            this.z = z;
        }
        ;
        return Position;
    }());
    ;
    var FlyingObject = (function () {
        function FlyingObject(velocity) {
            if (velocity === void 0) { velocity = 0; }
            this.velocity = velocity;
            this.type = 'zorro';
            this.velocity = 0;
        }
        return FlyingObject;
    }());
    var UFO = (function (_super) {
        __extends(UFO, _super);
        function UFO(argument) {
            var _this = this;
            return _this;
            // code...
        }
        return UFO;
    }(FlyingObject));
    Aviation.UFO = UFO;
})(Aviation || (Aviation = {}));
