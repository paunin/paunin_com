// High-tech animated background particles
(function() {
    'use strict';
    
    const canvas = document.createElement('canvas');
    const ctx = canvas.getContext('2d');
    canvas.style.position = 'fixed';
    canvas.style.top = '0';
    canvas.style.left = '0';
    canvas.style.width = '100%';
    canvas.style.height = '100%';
    canvas.style.zIndex = '-1';
    canvas.style.pointerEvents = 'none';
    document.body.insertBefore(canvas, document.body.firstChild);
    
    let particles = [];
    let connections = [];
    let width = window.innerWidth;
    let height = window.innerHeight;
    let glitchOpacity = 1;
    let isGlitching = false;
    let teleportedParticles = new Map(); // Map particle to fade progress
    
    canvas.width = width;
    canvas.height = height;
    
    class Particle {
        constructor() {
            this.x = Math.random() * width;
            this.y = Math.random() * height;
            const speedMultiplier = Math.random() * 1.5 + 0.3;
            this.vx = (Math.random() - 0.5) * speedMultiplier;
            this.vy = (Math.random() - 0.5) * speedMultiplier;
            this.radius = Math.random() * 3 + 0.5;
            this.opacity = Math.random() * 0.4 + 0.3;
        }
        
        update() {
            if (!isGlitching) {
                this.x += this.vx;
                this.y += this.vy;
                
                if (this.x < 0 || this.x > width) this.vx *= -1;
                if (this.y < 0 || this.y > height) this.vy *= -1;
            }
        }
        
        draw() {
            if (teleportedParticles.has(this)) {
                const fadeProgress = teleportedParticles.get(this);
                // Make teleported particles larger and more visible
                const expandedRadius = this.radius * (1.5 - 0.5 * fadeProgress); // Start 1.5x larger, shrink to normal
                
                ctx.beginPath();
                ctx.arc(this.x, this.y, expandedRadius, 0, Math.PI * 2);
                
                // Transition from black (0,0,0) to gray (100,100,100)
                const r = Math.floor(100 * fadeProgress);
                const g = Math.floor(100 * fadeProgress);
                const b = Math.floor(100 * fadeProgress);
                ctx.fillStyle = `rgba(${r}, ${g}, ${b}, 1)`;
                ctx.fill();
            } else {
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.radius, 0, Math.PI * 2);
                ctx.fillStyle = `rgba(100, 100, 100, ${this.opacity * glitchOpacity})`;
                ctx.fill();
            }
        }
    }
    
    function init() {
        particles = [];
        const particlesPerSquarePixel = 1 / 5000;
        const particleCount = Math.floor(width * height * particlesPerSquarePixel);
        
        for (let i = 0; i < particleCount; i++) {
            particles.push(new Particle());
        }
        console.log(particles.length);
    }
    
    function drawConnections() {
        const maxDistance = 150;
        const maxRadius = 3.5; // Maximum possible particle radius
        
        for (let i = 0; i < particles.length; i++) {
            for (let j = i + 1; j < particles.length; j++) {
                const dx = particles[i].x - particles[j].x;
                const dy = particles[i].y - particles[j].y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < maxDistance) {
                    // Distance-based opacity
                    const distanceOpacity = (1 - distance / maxDistance) * 0.25;
                    
                    // Size-based opacity (average of both particles' sizes)
                    const avgSize = (particles[i].radius + particles[j].radius) / 2;
                    const sizeOpacity = avgSize / maxRadius;
                    
                    // Combine both factors
                    const opacity = distanceOpacity * sizeOpacity;
                    
                    ctx.beginPath();
                    ctx.strokeStyle = `rgba(100, 100, 100, ${opacity * glitchOpacity})`;
                    ctx.lineWidth = 0.7;
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
    }
    
    function triggerGlitch() {
        if (isGlitching) return;
        
        isGlitching = true;
        
        // Generate random number of blink pairs (3-6 pairs = 6-12 total blinks)
        const blinkPairs = Math.floor(Math.random() * 4) + 3;
        const blinkSequence = [];
        
        for (let i = 0; i < blinkPairs; i++) {
            // Each pair: off then on
            const offDuration = Math.floor(Math.random() * 80) + 30;  // 30-110ms off
            const onDuration = Math.floor(Math.random() * 100) + 40;  // 40-140ms on
            
            blinkSequence.push({ duration: offDuration, opacity: 0 });
            blinkSequence.push({ duration: onDuration, opacity: 1 });
        }
        
        // Always end with full opacity for smooth return
        blinkSequence.push({ duration: 100, opacity: 1 });
        
        let currentStep = 0;
        
        function executeBlink() {
            if (currentStep >= blinkSequence.length) {
                // Teleport 15-30% of particles
                const teleportPercentage = Math.random() * 0.15 + 0.15; // 15-30%
                const particlesToTeleport = Math.floor(particles.length * teleportPercentage);
                
                // Randomly select particles to teleport
                const shuffled = [...particles].sort(() => Math.random() - 0.5);
                
                for (let i = 0; i < particlesToTeleport; i++) {
                    shuffled[i].x = Math.random() * width;
                    shuffled[i].y = Math.random() * height;
                    teleportedParticles.set(shuffled[i], 0); // Start fade at 0
                }
                
                // Start fade transition
                const fadeStartTime = Date.now();
                const fadeDuration = 500; // 0.5 seconds
                
                function updateFade() {
                    const elapsed = Date.now() - fadeStartTime;
                    const progress = Math.min(elapsed / fadeDuration, 1);
                    
                    teleportedParticles.forEach((_, particle) => {
                        teleportedParticles.set(particle, progress);
                    });
                    
                    if (progress < 1) {
                        requestAnimationFrame(updateFade);
                    } else {
                        teleportedParticles.clear();
                    }
                }
                
                updateFade();
                glitchOpacity = 1;
                isGlitching = false;
                scheduleNextGlitch();
                
                return;
            }
            
            const step = blinkSequence[currentStep];
            glitchOpacity = step.opacity;
            
            setTimeout(() => {
                currentStep++;
                executeBlink();
            }, step.duration);
        }
        
        executeBlink();
    }
    
    function scheduleNextGlitch() {
        const delay = (Math.random() * 3000 + 7000); // 7-10 seconds
        setTimeout(triggerGlitch, delay);
    }
    
    function animate() {
        ctx.clearRect(0, 0, width, height);
        
        particles.forEach(particle => {
            particle.update();
            particle.draw();
        });
        
        drawConnections();
        
        requestAnimationFrame(animate);
    }
    
    window.addEventListener('resize', () => {
        width = window.innerWidth;
        height = window.innerHeight;
        canvas.width = width;
        canvas.height = height;
        init();
    });
    
    init();
    animate();
    scheduleNextGlitch();
})();

