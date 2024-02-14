<!DOCTYPE html>
<html>
<style>
.counter {
    background-color: #f2f2f2;
    padding: 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.counter-item {
    text-align: center;
}

.counter-item h2 {
    font-size: 64px;
    color: #333;
    margin-bottom: 10px;
}

.counter-item .counter-number {
    display: inline-block;
    font-size: 64px;
    color: #3d9970;
    margin: 0 5px;
    animation: counter 2s ease-in-out forwards;
}

@keyframes counter {
    0% {
        counter-reset: count 0;
    }
    100% {
        counter-increment: count 100000; /* adjust the number to match the target value */
    }
}

.counter-item p {
    font-size: 24px;
    color: #333;
    margin-bottom: 0;
}
</style>
<body>

<section class="counter">
    <div class="counter-item">
        <h2>100<span class="counter-number">0</span>K</h2>
        <p>FUX ACADEMY Courses</p>
    </div>
    <div class="counter-item">
        <h2>5<span class="counter-number">1</span>50</h2>
        <p>Students Enrolled</p>
    </div>
     <div class="counter-item">
        <h2><span class="counter-number">3</span>50</h2>
        <p>degrees</p>
    </div>
</section>
</body>
</html>
