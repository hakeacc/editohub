    <footer style="background: var(--bg); border-top: 1px solid var(--border); padding: 80px 6% 40px; position: relative; transition: background 0.4s, border-color 0.4s;">
        <div style="max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 50px;">
            
            <div>
                <div style="display: flex; align-items: center; gap: 15px; margin-bottom: 20px;">
                    <img src="https://i.ibb.co/JR76yvRp/1758037248-icon.png" style="width: 45px; height: 45px; border-radius: 50%;" alt="EditoHub Agency">
                    <h2 style="font-size: 2rem; font-weight: 900; color: var(--text-main); margin: 0;">EditoHub</h2>
                </div>
                
                <p style="color: var(--text-muted); line-height: 1.6; margin-bottom: 25px; font-size: 0.95rem;">
                    EditoHub is a premium video content agency specializing in motion graphics video production, good video editing for YouTube, and viral thumbnail design. We provide comprehensive YouTube automation strategies crafted by expert creative engineers to maximize retention. Partner with our agency video production team today.
                </p>
                
                <div style="display: flex; gap: 15px;">
                    <a href="https://discord.gg/editohub-1402333030827425922" target="_blank" style="width: 45px; height: 45px; background: var(--surface); border: 1px solid var(--border); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s; color: #5865f2;">
                        <i class="fab fa-discord" style="font-size: 1.2rem;"></i>
                    </a>
                    <a href="https://youtube.com/@edito-hub" target="_blank" style="width: 45px; height: 45px; background: var(--surface); border: 1px solid var(--border); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s; color: #ff0000;">
                        <i class="fab fa-youtube" style="font-size: 1.2rem;"></i>
                    </a>
                    <a href="https://x.com/EditoHub_in" target="_blank" style="width: 45px; height: 45px; background: var(--surface); border: 1px solid var(--border); border-radius: 50%; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: 0.3s; color: var(--text-main);">
                        <i class="fab fa-x-twitter" style="font-size: 1.2rem;"></i>
                    </a>
                    
                    <a href="https://linkedin.com/company/editohub" class="sr-only">LinkedIn</a>
                    <a href="https://instagram.com/editohub" class="sr-only">Instagram</a>
                    <a href="https://facebook.com/editohub" class="sr-only">Facebook</a>
                </div>
            </div>

            <div>
                <h3 style="color: var(--text-main); margin-bottom: 20px;">The Agency</h3>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <a href="/" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Home</a>
                    <a href="services" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Services</a>
                    <a href="portfolio" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Portfolio</a>
                    <a href="collab" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Partnerships</a>
                    
                    <a href="blog" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Insights</a>
                    
                    <a href="about" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">About & FAQ</a>
                </div>
            </div>

            <div>
                <h3 style="color: var(--text-main); margin-bottom: 20px;">Client Hub</h3>
                <div style="display: flex; flex-direction: column; gap: 12px;">
                    <a href="workflow" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Workflow</a>
                    <a href="pricing" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Rates & Retainers</a>
                    <a href="contact" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Contact Us</a>
                    <a href="toc" style="color: var(--text-muted); text-decoration: none; transition: 0.3s;" onmouseover="this.style.color='var(--primary)'" onmouseout="this.style.color='var(--text-muted)'">Terms of Service</a>
                </div>
            </div>
        </div>
        <p style="text-align: center; color: var(--text-muted); margin-top: 60px; font-size: 0.8rem; opacity: 0.8;">&copy; 2026 EditoHub. Owned by digital natives.</p>
    </footer>

    <div id="discordModal" class="modal">
        <div class="modal-box">
            <h2 style="color: var(--text-main); margin-bottom: 15px;">Connect on Discord</h2>
            <p style="color: var(--text-muted); margin-bottom: 25px;">Open a ticket to discuss your project.</p>
            <a href="https://discord.gg/editohub-1402333030827425922" class="btn btn-main" style="width: 100%;"><i class="fab fa-discord"></i> Join Server</a>
            <button onclick="closeModal('discordModal')" style="background: none; border: none; color: var(--text-muted); margin-top: 20px; cursor: pointer; font-weight: 800; text-transform: uppercase;">Cancel</button>
        </div>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
        window.addEventListener('load', () => {
            if(typeof AOS !== 'undefined') {
                AOS.init({ 
                    duration: 800, 
                    easing: 'ease-out-cubic', 
                    once: true, 
                    disable: 'mobile' 
                });
            }
            setTimeout(() => { 
                const loader = document.getElementById('dream-loader');
                if (loader) loader.classList.add('loader-hidden'); 
            }, 300);
        });

        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('.auto-type').forEach(el => {
                const words = el.getAttribute('data-words').split('|');
                let i = 0;
                
                function type() {
                    let word = words[i].split("");
                    let loopTyping = function() {
                        if(word.length > 0) { 
                            el.innerHTML += word.shift(); 
                            setTimeout(loopTyping, 80); 
                        } else { 
                            setTimeout(del, 2000); 
                        }
                    };
                    loopTyping();
                }
                
                function del() {
                    let word = words[i].split("");
                    let loopDeleting = function() {
                        if(word.length > 0) { 
                            word.pop(); 
                            el.innerHTML = word.join(""); 
                            setTimeout(loopDeleting, 40); 
                        } else { 
                            i = (i + 1) % words.length; 
                            setTimeout(type, 400); 
                        }
                    };
                    loopDeleting();
                }
                
                setTimeout(type, 1000);
            });
        });
    </script>
</body>
</html>
