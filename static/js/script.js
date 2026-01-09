  const nav = document.getElementById('navbar');
        const brandText = document.getElementById('brandText');
        const mobileMenu = document.getElementById('mobile-menu');
        const navLinks = document.getElementById('navLinks');

        window.addEventListener('scroll', function () {
            const scrollY = window.scrollY;

            // 1. Initial Stick & Slide from top animation
            if (scrollY > 50) {
                nav.classList.add('scrolled');
            } else {
                nav.classList.remove('scrolled');
            }

            // 2. Disappear website name as user scrolls deeper
            if (scrollY > 150) {
                brandText.classList.add('hidden');
            } else {
                brandText.classList.remove('hidden');
            }
        });

        // Mobile Menu Toggle
        mobileMenu.addEventListener('click', () => {
            mobileMenu.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        // Close mobile menu when a link is clicked
        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                mobileMenu.classList.remove('active');
                navLinks.classList.remove('active');
            });
        });
        document.addEventListener('DOMContentLoaded', () => {
            const observerOptions = {
                threshold: 0.2 // Trigger when 20% of the section is visible
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        // Add the active class to the left and right blocks
                        entry.target.querySelectorAll('.scroll-reveal-left, .scroll-reveal-right')
                            .forEach(el => el.classList.add('reveal-active'));
                    }
                });
            }, observerOptions);

            // Start observing the trust section
            const targetSection = document.querySelector('.trust-section');
            if (targetSection) {
                observer.observe(targetSection);
            }
        });
        const textElement = document.getElementById("dynamic-text");
        const words = ["guidance.", "planning."];
        let wordIndex = 0;
        let charIndex = 0;
        let isDeleting = false;
        let typeSpeed = 150;

        function typeEffect() {
            const currentWord = words[wordIndex];

            if (isDeleting) {
                // Remove characters
                textElement.textContent = currentWord.substring(0, charIndex - 1);
                charIndex--;
                typeSpeed = 100;
            } else {
                // Add characters
                textElement.textContent = currentWord.substring(0, charIndex + 1);
                charIndex++;
                typeSpeed = 200;
            }

            if (!isDeleting && charIndex === currentWord.length) {
                // Pause at the end of the word
                isDeleting = true;
                typeSpeed = 2000; // Wait 2 seconds before backspacing
            } else if (isDeleting && charIndex === 0) {
                // Switch to the next word
                isDeleting = false;
                wordIndex = (wordIndex + 1) % words.length;
                typeSpeed = 500;
            }

            setTimeout(typeEffect, typeSpeed);
        }

        // Start the animation on load
        document.addEventListener("DOMContentLoaded", typeEffect);


        document.addEventListener("DOMContentLoaded", () => {
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        const boxes = entry.target.querySelectorAll('.offer-box');
                        boxes.forEach((box, index) => {
                            setTimeout(() => {
                                box.classList.add('reveal-active');
                            }, index * 120); // 120ms gap for smooth wave
                        });
                    }
                });
            }, { threshold: 0.1 });

            const grid = document.querySelector('.offer-grid');
            if (grid) observer.observe(grid);
        });


        window.addEventListener('load', () => {
    const line = document.getElementById('line');
    const text = document.getElementById('statementText');

    // Step 1: Grow the vertical line
    setTimeout(() => {
        line.classList.add('line-grow');
    }, 300); // Small delay after page load

    // Step 2: Slide the text out from the line
    setTimeout(() => {
        text.classList.add('text-slide');
    }, 800); // Starts after the line finishes growing
});




document.addEventListener("DOMContentLoaded", () => {
    const section = document.querySelector('.statement-section');
    const line = document.getElementById('line');
    const text = document.getElementById('statementText');
    const img = document.getElementById('imageReveal');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Trigger line growth
                line.classList.add('line-grow');
                
                // Trigger text slide-out
                setTimeout(() => {
                    text.classList.add('text-slide');
                }, 400);

                // Trigger image fade/scale
                setTimeout(() => {
                    img.classList.add('img-active');
                }, 800);
            }
        });
    }, { threshold: 0.3 });

    observer.observe(section);
});




document.addEventListener("DOMContentLoaded", () => {
    const infoBox = document.getElementById('infoBox');
    
    const observerOptions = {
        threshold: 0.3 // Trigger when 30% of the section is visible
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // When in view: Slide out from behind image
                infoBox.classList.add('reveal-info');
            } else {
                // Rescroll: Hide it back behind the image
                infoBox.classList.remove('reveal-info');
            }
        });
    }, observerOptions);

    const section = document.querySelector('.expert-profile-section');
    if (section) observer.observe(section);
});


document.addEventListener("DOMContentLoaded", () => {
    const infoBox = document.getElementById('whyUsInfo');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Scroll down: Info slides out to the left
                infoBox.classList.add('info-reveal-active');
            } else {
                // Scroll up: Resets the animation
                infoBox.classList.remove('info-reveal-active');
            }
        });
    }, { threshold: 0.2 });

    const section = document.querySelector('.why-us-section');
    if (section) observer.observe(section);
});



document.addEventListener("DOMContentLoaded", () => {
    const cards = document.querySelectorAll('.serve-card');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                // Add a small delay for each card to create a sequence
                setTimeout(() => {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                }, index * 150); 
            }
        });
    }, { threshold: 0.1 });

    cards.forEach(card => {
        // Initial state for JS animation
        card.style.opacity = "0";
        card.style.transform = "translateY(30px)";
        card.style.transition = "all 0.6s ease-out";
        observer.observe(card);
    });
});



document.addEventListener("DOMContentLoaded", () => {
    const card = document.querySelector('.contact-card');
    const shapes = document.querySelectorAll('.shape');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Animate Main Card
                card.style.opacity = "1";
                card.style.transform = "translateY(0)";
                
                // Animate Triangles one by one
                shapes.forEach((shape, i) => {
                    setTimeout(() => {
                        shape.style.opacity = "1";
                        shape.style.transform = "translate(0, 0) scale(1)";
                    }, 400 + (i * 150));
                });
            }
        });
    }, { threshold: 0.2 });

    // Initial Hidden State for Animation
    card.style.opacity = "0";
    card.style.transform = "translateY(50px)";
    card.style.transition = "all 1s cubic-bezier(0.16, 1, 0.3, 1)";

    shapes.forEach(s => {
        s.style.opacity = "0";
        s.style.transform = "translateY(-20px) scale(0.5)";
        s.style.transition = "all 0.8s ease-out";
    });

    observer.observe(card);
});




document.addEventListener("DOMContentLoaded", () => {
    const mapContainer = document.querySelector('.map-container');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                mapContainer.classList.add('reveal-map');
            } else {
                mapContainer.classList.remove('reveal-map');
            }
        });
    }, { threshold: 0.2 });

    observer.observe(mapContainer);
});


document.addEventListener("DOMContentLoaded", () => {
    const infoCards = document.querySelectorAll('.info-card');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                // Find index to create staggered delay
                const allCards = Array.from(infoCards);
                const index = allCards.indexOf(entry.target);
                
                setTimeout(() => {
                    entry.target.style.opacity = "1";
                    entry.target.style.transform = "translateY(0)";
                }, index * 200); // 200ms delay between each card
            }
        });
    }, { threshold: 0.2 });

    infoCards.forEach(card => observer.observe(card));
});







// services start

       
        // Comprehensive Data Repo with Custom Headings
        const serviceDatabase = {
            'MUTUALFUND': {
                title: 'Mutual Fund Investment',
                intro: 'A mutual fund pools money from many investors and invests it in stocks, bonds, or other securities. The fund is managed by a professional fund manager.You own units of the fund proportional to your investment..',
                sections: [
                    {
                        heading: ' How Mutual Funds Work',
                        icon: 'fa-gears',
                        points: ['Investors put money into the fund', 'Fund manager invests based on the fund’s objective', 'Returns (profit/loss) are shared among investors', 'Unit value is called NAV (Net Asset Value)']
                    },
                    {
                        heading: 'Types of Mutual Funds',
                        icon: 'fa-award',
                        points: ['Equity Funds – Invest in stocks (high risk, high return)', 'Debt Funds – Invest in bonds & fixed income (lower risk)', 'Hybrid Funds – Mix of equity & debt', 'Gold / Commodity Funds', 'Index Funds – Track indices like Nifty 50, Sensex','Sector Funds – A Sectoral Fund is a mutual fund that invests in companies from a single specific industry or sector.','Thematic Funds – Thematic Funds focus on a common investment theme, cutting across different sectors.']
                    },
                    {
                        heading: 'Ways to Invest',
                        icon: 'fa-star',
                        points: ['LumpSum – One-time investment', 'SIP (Systematic Investment Plan) – Invest monthly/quarterly']
                    },
                    {
                        heading: 'Benefits of Mutual Funds',
                        icon: 'fa-star',
                        points: ['Professional management',
                            ' Diversification (risk spread)', ' Affordable (start with small amounts)', ' Liquidity (most funds can be redeemed easily)', ' Suitable for all goals']
                    }
                ]
            },
            'SIP': {
                title: 'SIP Planning',
                intro: 'A SIP is a way of investing a fixed amount regularly (monthly/quarterly) into a mutual fund.Example:You invest Rs:5,000 every month instead of investing a lumpsum',
                sections: [
                    {
                        heading: ' How SIP Works',
                        icon: 'fa-rotate',
                        points: ['Funds are invested through registered mandates on a fixed date', 'You buy more units when markets fall and fewer when markets rise', 'This averages the cost → called Rupee Cost Averaging']
                    },
                    {
                        heading: 'Why SIP is a Smart Investment',
                        icon: 'fa-users',
                        points: ['   Disciplined saving',
                            'Start with lowest amount',
                            ' Reduces market timing risk',
                            ' Power of compounding',
                            ' Ideal for long-term goals']
                    },
                    {
                        heading: ' Types of SIP',
                        icon: 'fa-shield-halved',
                        points: [' Regular SIP – Fixed amount',
                            'Step-Up SIP – Increase SIP every year (best option)',
                            'Flexible SIP – Amount changes as per cash flow',
                            'Perpetual SIP (no end date)',
                             'Multi SIP (invests in multiple funds at once)',
                            'SIP with Insurance (combines investment with life cover)'
                        ]
                    },{
                        heading: 'Ways to invest ',
                        icon: 'fa-shield-halved',
                        points: [' Daily - Rs.100/- minimum',
                            'Weekly - Rs.500/- minimum',
                            'Quarterly – Rs.1,500/- minimum',
                            'Monthly – Rs.500/- minimum',
                           
                        ]
                    }
                ]
            },
            'SWP': {
                title: 'SWP: Systematic Withdrawal Plan',
                intro: 'An SWP allows you to withdraw a fixed amount regularly (monthly/quarterly) from your mutual fund investment. Think of it as a "salary" from your own investments.',
                sections: [
                    {
                        heading: ' How SWP Works',
                        icon: 'fa-rotate',
                        points: [
                            'Invest a lumpsum in a selected mutual fund',
                            'Set your fixed withdrawal amount & frequency',
                            'Fund units are redeemed automatically for cash',
                            'Remaining balance stays invested and grows'
                        ]
                    },
                    {
                        heading: ' Why Use SWP?',
                        icon: 'fa-bullseye',
                        points: [
                            'Regular income & tax-efficient withdrawals',
                            'Better than fixed deposits for retirees',
                            'Capital continues to grow while you withdraw',
                            'Total flexibility in amount & duration'
                        ]
                    },
                    {
                        heading: ' Taxation of SWP (India)',
                        icon: 'fa-file-invoice-dollar',
                        points: [
                            'Equity Funds (<1yr): 20% STCG',
                            'Equity Funds (>1yr): 12.5% LTCG (Above Rs.1L Capital gains)',
                            'Debt Funds: Taxed as per your Income Slab',
                            ' Note: Only the profit portion of withdrawal is taxed'
                        ]
                    },
                    {
                        heading: ' Who Should Use SWP?',
                        icon: 'fa-user-check',
                        points: [
                            'Retired individuals seeking a pension',
                            'People with specific monthly income needs',
                            'Those who sold property or business assets',
                            'Investors shifting from equity to debt'
                        ]
                    },
                    {
                        heading: ' Ideal SWP Strategy',
                        icon: 'fa-hourglass-start',
                        points: [
                            'Keep 1–2 years’ expenses in debt funds',
                            'Keep balance in hybrid/equity funds',
                            'Annual review & adjust withdrawal amount',
                            'Match your withdrawal with annual inflation'
                        ]
                    },
                    {
                        heading: ' Planning Example',
                        icon: 'fa-calculator',
                        points: [
                            'Investment: Rs:50 Lakh | Return: 8%',
                            'Monthly SWP: Rs:30,000',
                            'Annual Withdrawal: Rs:3.6 Lakh',
                            'Result: Sustainable long-term cash flow'
                        ]
                    },
                
                    {
                        heading: ' Best Funds for SWP',
                        icon: 'fa-chart-simple',
                        points: [
                            ' Low Risk: Liquid, Ultra Short, or Arbitrage',
                            ' Moderate: Conservative or Balanced Advantage',
                            ' Higher Return: Equity Hybrid (Long-term only)'
                        ]
                    },
                    {
                        heading: ' SIP + SWP Combo',
                        icon: 'fa-arrows-spin',
                        points: [
                            'Phase 1: Earning years → Create wealth via SIP',
                            'Phase 2: Retirement → Withdraw via SWP',
                            ' The ultimate long-term wealth cycle'
                        ]
                    },
                    {
                        heading: ' SWP Planning Checklist',
                        icon: 'fa-list-check',
                        points: [
                            ' Decide monthly income needed',
                            ' Choose correct fund category',
                            ' Keep return expectations realistic',
                            ' Plan for tax implications',
                            ' Schedule an annual review'
                        ]
                    }
                ]
            },
            'STP': {
                title: 'STP: Systematic Transfer Plan',
                intro: 'STP allows you to systematically transfer money from one mutual fund scheme to another within the same AMC. It is the most effective way to enter the equity market with a lumpsum.',
                sections: [
                    {
                        heading: ' How STP Works',
                        icon: 'fa-shuffle',
                        points: [
                            'Invest a lumpsum in a debt or liquid fund',
                            'Choose a fixed transfer amount & frequency (e.g., Monthly)',
                            'Money is transferred automatically to a target equity fund',
                            'Reduces market timing risk significantly'
                        ]
                    },
                    {
                        heading: ' Why Use STP?',
                        icon: 'fa-bullseye',
                        points: [
                            'Ideal for large lumpsum investments',
                            'Reduces overall volatility and entry risk',
                            'Ensures a disciplined entry into equity markets',
                            'Earns debt-fund returns while waiting to enter equity',
                            'Better risk management than direct lumpsum equity investing'
                        ]
                    },
                    {
                        heading: ' Who Should Use STP?',
                        icon: 'fa-user-group',
                        points: [
                            'Investors with a large lumpsum ready to invest',
                            'People hesitant about current market timing',
                        
                            'First-time equity investors looking for a safe entry'
                        ]
                    },
                    {
                        heading: ' STP Planning Example',
                        icon: 'fa-calculator',
                        points: [
                            'lumpSum Amount: Rs:10 Lakh',
                            'STP Transfer Amount: Rs:50,000/month',
                            'Duration: 20 Months',
                            ' Result: Money gradually moves into equity while spreading risk across different market levels'
                        ]
                    },
                    {
                        heading: ' Best Funds for STP',
                        icon: 'fa-chart-pie',
                        points: [
                            'Source Fund (To/From): Liquid, Ultra Short Duration, or Arbitrage Funds',
                            'Target Fund (From/To): Index Funds, Flexi Cap, Large Cap, or Balanced Advantage Funds'
                        ]
                    }, {
                        heading: ' Taxation of STP ',
                        icon: 'fa-file-invoice-dollar',
                        points: [
                            ' Each transfer is treated as a redemption',
                            'Debt Source: Gains taxed as per income slab',
                            'Equity Target: New date starts for tax holding period',
                            ' STP is tax-efficient but not tax-free'
                        ]
                    },
                    {
                        heading: ' Ideal STP Strategy',
                        icon: 'fa-lightbulb',
                        points: [
                            'Transfer over 6–24 months for better averaging',
                            'Match STP amount with your risk appetite',
                            'Avoid very short STP periods (too aggressive)',
                            'Review market conditions and progress yearly'
                        ]
                    },
                    {
                        heading: ' Who Should Use STP?',
                        icon: 'fa-user-group',
                        points: [
                            'Investors with a large lumpsum ready to invest',
                            'People hesitant about current market timing',
                            'First-time equity investors looking for a safe entry'
                        ]
                    },
                    {
                        heading: ' Common STP Mistakes',
                        icon: 'fa-circle-exclamation',
                        points: [
                            ' Too aggressive transfer amount',
                            ' Using long-duration debt funds as source',
                            ' Ignoring the impact of taxation on transfers',
                            ' Panic stopping STP during market volatility'
                        ]
                    },
                    {
                        heading: ' STP Planning Example',
                        icon: 'fa-calculator',
                        points: [
                            'lumpSum Amount: Rs:10 Lakh',
                            'STP Transfer Amount: Rs:50,000/month',
                            'Duration: 20 Months',
                            ' Risk is spread across different market levels'
                        ]
                    },
                    {
                        heading: ' Best Funds for STP',
                        icon: 'fa-chart-pie',
                        points: [
                            'Source (From): Liquid, Ultra Short, or Arbitrage',
                            'Target (To): Index, Flexi Cap, or Balanced Advantage'
                        ]
                    },
                    {
                        heading: ' SIP vs STP vs SWP',
                        icon: 'fa-code-compare',
                        points: [
                            'SIP → Regular monthly investing from income',
                            'STP → Gradual lumpsum investing from debt',
                            'SWP → Regular withdrawals for income'
                        ]
                    },
                    {
                        heading: ' STP Planning Checklist',
                        icon: 'fa-list-check',
                        points: [
                            ' Finalize lumpsum amount',
                            ' Define specific investment goal',
                            ' Determine time horizon (6-24 months)',
                            ' Assess personal risk appetite',
                            ' Select the correct fund pairing'
                        ]
                    },
                ]
            },

            'GOAL': {
                title: 'Goal-Based Financial Planning',
                intro: 'Goal-based planning means investing with a clear purpose, not randomly. You first decide your life goals, then choose investments specifically designed to achieve them.',
                sections: [
                    {
                        heading: ' What is Goal-Based Planning?',
                        icon: 'fa-seedling',
                        points: [
                            'Focuses on achieving life milestones rather than just chasing returns',
                            'Provides a roadmap for your financial journey',
                            'Helps in selecting the right asset allocation for each specific need',
                            'Purpose: Invest with a clear target, not in isolation'
                        ]
                    },
                    {
                        heading: ' Common Financial Goals',
                        icon: 'fa-crosshairs',
                        points: [
                            ' Buying your dream home',
                            ' Funding child’s higher education',
                            ' Planning for marriage expenses',
                            ' Purchasing a new vehicle',
                            ' Long-term retirement security',
                            ' Travel & lifestyle aspirations',
                            ' Building a robust emergency fund'
                        ]
                    },
                    {
                        heading: ' Identify Your Goals',
                        icon: 'fa-compass',
                        points: [
                            'Define the Goal amount (in today’s cost)',
                            'Determine the Time Horizon (Years left to achieve)',
                            'Assign Priority: High (Must have), Medium, or Low',
                            'Categorize into Short, Medium, and Long-term'
                        ]
                    },
                    {
                        heading: '  Adjust for Inflation',
                        icon: 'fa-chart-line',
                        points: [
                            'Money loses value over time; today\'s Rs:10k won\'t buy as much in 10 years',
                            '**Example:** Education today = Rs:10 Lakh',
                            'After 15 years (at 8% inflation) ≈ Rs:31.7 Lakh',
                            ' Planning without inflation is planning to fail'
                        ]
                    },
                    {
                        heading: ' 3. Asset Allocation Strategy',
                        icon: 'fa-pie-chart',
                        points: [
                            'Short Term (<3 years): Focus on Debt & Liquid funds',
                            'Medium Term (3-7 years): Balanced or Hybrid funds',
                            'Long Term (>7 years): Equity funds for wealth growth',
                            'High Priority Goals: Use safer, low-volatility assets'
                        ]
                    },
                    {
                        heading: ' Planning Checklist',
                        icon: 'fa-list-check',
                        points: [
                            ' List all short & long term goals',
                            ' Attach a realistic cost to each',
                            ' Account for inflation (typically 6-8%)',
                            ' Automate investments via SIP',
                            ' Review and rebalance every 6-12 months'
                        ]
                    }
                ]
            },
            'ELSS': {
                title: 'ELSS: Equity Linked Savings Scheme',
                intro: 'ELSS is the only tax-saving mutual fund that invests primarily in equity markets. It offers the dual advantage of potential wealth creation and significant tax savings.',
                sections: [
                    {
                        heading: ' Key Features of ELSS',
                        icon: 'fa-star',
                        points: [
                            ' Shortest lock-in: Just 3 years (vs 5-15 years for other 80C options)',
                            ' Tax deduction: Save up to Rs:1.5 Lakh under Section 80C annually',
                            ' Market-linked: Higher growth potential compared to FD or PPF',
                            ' Flexibility: Choose between SIP or lumpSum investments'
                        ]
                    },
                    {
                        heading: ' ELSS Investment Example',
                        icon: 'fa-calculator',
                        points: [
                            'Investment: Rs:1,50,000',
                            'Tax Saved (30% slab + Cess): Up to Rs:46,800',
                            'Potential Value: Growth at market-linked rates over 3+ years',
                            ' Outcome: Immediate tax relief + long-term capital appreciation'
                        ]
                    },
                    {
                        heading: ' ELSS SIP Advantage',
                        icon: 'fa-chart-line',
                        points: [
                            'Spread your 80C investment across the entire financial year',
                            'Benefit from Rupee Cost Averaging during market dips',
                            ' Note: Each SIP installment has its own 3-year lock-in period',
                            'Example: Rs:12,500/month ensures your full 80C limit is covered'
                        ]
                    },
                    {
                        heading: ' Taxation of ELSS Returns',
                        icon: 'fa-file-invoice-dollar',
                        points: [
                            'During Investment: Eligible for 80C deduction (Old Tax Regime only)',
                            'At Redemption: Taxed as Long-Term Capital Gains (LTCG)',
                            'LTCG Rate: 12.5% on gains exceeding Rs:1.25 Lakh per year',
                            'Exemption: The first Rs:1.25 Lakh of annual profit is tax-free'
                        ]
                    },
                    {
                        heading: ' Important Points to Note',
                        icon: 'fa-circle-exclamation',
                        points: [
                            'ELSS provides NO tax benefit under the New Tax Regime',
                            'Returns are linked to equity markets and are not guaranteed',
                            'Short-term volatility is expected; hold for 5–10 years for best results',
                            'No premature exit is allowed during the mandatory 3-year lock-in'
                        ]
                    },
                    {
                        heading: ' Smart ELSS Strategy',
                        icon: 'fa-lightbulb',
                        points: [
                            'Start SIPs early in April rather than a lumpsum in March',
                            'Stay invested beyond 3 years to benefit from long-term compounding',
                            'Choose a fund based on long-term consistency, not just 1-year returns',
                            'Review performance annually but avoid frequent fund hopping'
                        ]
                    },
                    {
                        heading: ' Who Should Invest?',
                        icon: 'fa-user-tie',
                        points: [
                            'Salaried employees needing to submit tax-saving proof',
                            'Self-employed professionals looking for tax-efficient growth',
                            'First-time equity investors seeking a disciplined 3-year start',
                            'Anyone in the higher tax bracket looking to save up to Rs:46,800'
                        ]
                    },
                    {
                        heading: ' Common ELSS Mistakes',
                        icon: 'fa-xmark-circle',
                        points: [
                            'Redeeming immediately after 3 years without checking goals',
                            'Investing only for tax saving without considering fund quality',
                            'Accumulating too many different ELSS funds every year',
                            'Ignoring the 3-year lock-in for each individual SIP installment'
                        ]
                    },
                    {
                        heading: ' ELSS Quick Checklist',
                        icon: 'fa-check-double',
                        points: [
                            ' Confirmed eligibility under the Old Tax Regime',
                            ' Minimum 3–5 year investment horizon',
                            ' SIP automated for disciplined tax saving',
                            ' Total 80C investments tracked (Rs:1.5 Lakh limit)'
                        ]
                    }
                ]
            },
            'TAX': {
                title: 'Smart Tax Planning',
                intro: 'Tax planning means legally reducing your tax liability by using deductions, exemptions, and smart investments—while also building wealth. It is not tax evasion; it is tax efficiency.',
                sections: [
                    {
                        heading: ' Step 1: Choose Your Regime',
                        icon: 'fa-scale-balanced',
                        points: [
                            'Old Tax Regime: Allows deductions (80C, 80D, etc.); suitable if you invest & claim benefits',
                            'New Tax Regime: Lower slab rates but NO major deductions',
                            ' Rule of thumb:If deductions > Rs:3.75 Lakh (FY 2025-26), Old regime is often better'
                        ]
                    },
                    {
                        heading: ' Sec 80C (Rs:1.5 Lakh Limit)',
                        icon: 'fa-key',
                        points: [
                            'ELSS Mutual Funds (Tax saving + equity growth)',
                            'PPF & EPF (Safe, long-term, tax-free returns)',
                            'Life Insurance Premium & 5-Year Tax Saver FDs',
                            'Home Loan Principal Repayment'
                        ]
                    },
                    {
                        heading: ' Health & Other Deductions',
                        icon: 'fa-hospital-user',
                        points: [
                            'Sec 80D:*Health Insurance for Self/Family (Rs:25k) & Parents (up to Rs:50k)',
                            'Sec 80E: Unlimited deduction on Education Loan interest',
                            'Sec 80TTA/B: Savings interest (up to Rs:10k for regular, Rs:50k for Seniors)'
                        ]
                    },
                    {
                        heading: ' The NPS Advantage',
                        icon: 'fa-piggy-bank',
                        points: [
                            'Sec 80CCD(1B): Exclusive extra Rs:50,000 deduction beyond 80C limit',
                            'Ideal for building a retirement corpus with extra tax efficiency',
                            'Hybrid investment with a mix of Equity and Debt exposure'
                        ]
                    },
                    {
                        heading: ' Housing Benefits',
                        icon: 'fa-house-chimney-user',
                        points: [
                            'HRA Exemption: Significant savings for those living in rented accommodation',
                            'Sec 24:** Home loan interest deduction up to Rs:2 Lakh for self-occupied homes',
                            'Combined impact: HRA + Home Loan can drastically lower taxable income'
                        ]
                    },
                    {
                        heading: ' Common Planning Mistakes',
                        icon: 'fa-triangle-exclamation',
                        points: [
                            ' Investing only in March (Last-minute panic)',
                            ' Mixing insurance with investment (Low returns)',
                            ' Ignoring health insurance benefits',
                            ' Not reviewing the Tax Regime choice yearly'
                        ]
                    },
                    {
                        heading: ' Yearly Timeline',
                        icon: 'fa-calendar-check',
                        points: [
                            'April–June: Choose your regime and start monthly SIPs',
                            'July–Sept:Review current investments and mid-year tax liability',
                            'Jan–March: Finalize all deductions and submit proofs'
                        ]
                    },
                    {
                        heading: ' The Success Formula',
                        icon: 'fa-equals',
                        points: [
                            'Income – Smart Deductions = Lower Tax',
                            'Always aim to combine tax saving with wealth creation',
                            'Start early in the year to avoid liquidity crunch in March'
                        ]
                    }
                ]
            },
            'REVIEW': {
                title: 'Portfolio Review & Analysis',
                intro: 'A portfolio review is a periodic checkup of your investments to ensure they are aligned with your goals, match your risk profile, and are performing as expected. It helps correct your financial course before small issues become large problems.',
                sections: [
                    {
                        heading: 'Why Portfolio Review is Important',
                        icon: 'fa-bullseye',
                        points: [
                            'Goal Alignment: Keeps investments focused on milestones like retirement or education',
                            'Risk Control: Prevents lopsided asset allocation due to market swings',
                            'Performance Tracking: Identifies and weeds out underperforming funds',
                            'Emotional Control: Replaces knee-jerk reactions with structured decision-making'
                        ]
                    },
                    {
                        heading: 'Review Frequency Guide',
                        icon: 'fa-clock',
                        points: [
                            'Annual Review: Ideal for most long-term investors to check strategy',
                            'Semi-Annual/Quarterly: Recommended for large or aggressive portfolios',
                            'Major Life Events: Review after marriage, children, or career changes',
                            'Market Extremes: Assess positions during significant volatility or policy changes'
                        ]
                    },
                    {
                        heading: 'Key Areas to Evaluate',
                        icon: 'fa-magnifying-glass-chart',
                        points: [
                            'Asset Allocation: Check the current mix of Equity, Debt, and Gold',
                            'Benchmark Comparison: Evaluate if funds are beating their relevant market indices',
                            'Concentration Risk: Watch for over-dependence on one sector or fund manager',
                            'Expense Ratios: Identify lower-cost alternatives like direct plans',
                            'Stock Overlap: Ensure diversification by checking for duplicate holdings across funds'
                        ]
                    },
                    {
                        heading: 'The Rebalancing Strategy',
                        icon: 'fa-scale-balanced',
                        points: [
                            'Define a target mix (e.g., 60% Equity / 40% Debt)',
                            'Identify drift when one asset class outperforms the other',
                            'Sell high and buy low by shifting gains to under-allocated assets',
                            'Trigger rebalancing annually or when allocation deviates by >5-10%'
                        ]
                    },
                    {
                        heading: 'Common Mistakes to Avoid',
                        icon: 'fa-circle-xmark',
                        points: [
                            'Chasing Performance: Investing in what did well last year (Recency Bias)',
                            'Panic Selling: Exiting during temporary downturns and missing recovery',
                            'Over-Diversification: Owning too many funds, which dilutes returns',
                            'Ignoring Tax/Fees: Forgetting exit loads and capital gains tax while switching'
                        ]
                    },
                    {
                        heading: 'Ideal Portfolio Structure Example',
                        icon: 'fa-layer-group',
                        points: [
                            'Equity (60-70%): For long-term growth and wealth creation',
                            'Debt (20-30%): For stability and meeting short-term needs',
                            'Gold/Alternatives (5-10%): For hedging against inflation and crises',
                            ' Note: Your ideal ratio depends on your age and risk appetite'
                        ]
                    }
                ]
            },
            'FD_ALT': {
                title: 'FD Alternatives (Debt Mutual Funds)',
                intro: 'Mutual funds do not offer fixed deposits like banks. Instead, they offer debt mutual funds that act as FD alternatives by providing better tax efficiency, similar or higher returns, and superior liquidity.',
                sections: [
                    {
                        heading: 'Types of MF Options Similar to FD',
                        icon: 'fa-list-check',
                        points: [
                            'Liquid Funds: Investment horizon up to 3 months; very low risk; better than savings accounts',
                            'Ultra Short Duration Funds: Horizon of 3–12 months; slightly higher returns than FD with low volatility',
                            'Low/Short Duration Funds: Horizon of 1–3 years; suitable replacement for short-term bank FDs',
                            'Corporate Bond Funds: Invests in high-quality bonds; provides moderate risk with slightly higher returns',
                            'Arbitrage Funds: Low risk with equity-style taxation; ideal for investors in high tax brackets'
                        ]
                    },
                    {
                        heading: 'Example Comparison',
                        icon: 'fa-scale-balanced',
                        points: [
                            'Investment: Rs:10 Lakh',
                            'FD Return: 6.5% | Debt MF Return: 7.5% (Estimates)',
                            'FD Tax (30% Slab): Taxed on total interest every year',
                            'MF Post-Tax: Often better due to tax deferral until withdrawal',
                            'Result: Mutual Funds generally offer better net-in-hand returns'
                        ]
                    },
                    {
                        heading: 'Taxation of Debt Mutual Funds',
                        icon: 'fa-file-invoice-dollar',
                        points: [
                            'Gains are taxed as per your individual income tax slab',
                            'Tax applies ONLY on the profit portion, not the principal',
                            'No TDS for Indian residents; pay tax only when you redeem'
                        ]
                    },
                    {
                        heading: 'When to Choose MF over FD',
                        icon: 'fa-circle-check',
                        points: [
                            'For short to medium-term financial goals',
                            'For investors in the high (20% or 30%) tax slabs',
                            'When you need high liquidity and quick access to funds',
                            'When you seek superior post-tax investment growth'
                        ]
                    },
                    {
                        heading: 'Risks to Understand',
                        icon: 'fa-triangle-exclamation',
                        points: [
                            'No Guaranteed Returns: Unlike bank FDs, returns fluctuate with market rates',
                            'Interest Rate & Credit Risk: Fund value may change based on bond market movements',
                            'NAV Fluctuations: Daily price changes can occur slightly',
                            ' Strategy: Choose high-quality (AAA rated) funds to minimize risk'
                        ]
                    },
                    {
                        heading: 'Smart Strategy & Checklist',
                        icon: 'fa-brain',
                        points: [
                            'Park emergency funds in highly liquid funds',
                            'Use Arbitrage funds if looking for equity-style tax efficiency',
                            'Ladder investments based on specific goal timelines',
                            ' Ensure time horizon is known and risk category is low',
                            ' Do not mix these with long-term equity wealth goals'
                        ]
                    }
                ]
            },
            'LAS': {
                title: 'Loan Against Securities (LAS)',
                intro: 'A Loan Against Securities (LAS) allows you to borrow money by pledging your investments—like mutual funds, shares, or bonds—without selling them. It provides instant liquidity while keeping your long-term wealth strategy intact.',
                sections: [
                    {
                        heading: 'How LAS Works',
                        icon: 'fa-hand-holding-dollar',
                        points: [
                            'Pledge your investments (MFs, Shares, Bonds, Insurance) to a lender',
                            'Receive a credit limit or loan based on the value of your assets',
                            'You remain the owner and continue to earn dividends/returns',
                            'Interest is charged ONLY on the actual amount utilized',
                            'Securities are released immediately upon loan repayment'
                        ]
                    },
                    {
                        heading: 'Loan Amount (LTV - Loan to Value)',
                        icon: 'fa-percent',
                        points: [
                            'Equity Mutual Funds: Approx. 45–60% LTV',
                            'Debt Mutual Funds: Approx. 70–85% LTV',
                            'Listed Shares: Approx. 50–60% LTV',
                            'Insurance Policies: Approx. 80–90% LTV',
                            'Example: Pledging Rs:10 Lakh in Equity MF can grant a loan up to Rs:5–6 Lakh'
                        ]
                    },
                    {
                        heading: 'LAS vs. Personal Loan',
                        icon: 'fa-code-compare',
                        points: [
                            'Interest Rate: LAS (8.5%–11.5%) is usually lower than Personal Loans',
                            'Processing Time: LAS is significantly faster (often 24–72 hours)',
                            'Collateral: LAS uses your portfolio; Personal Loans are unsecured',
                            'Tax Impact: LAS avoids capital gains tax because no assets are sold'
                        ]
                    },
                    {
                        heading: 'Key Advantages',
                        icon: 'fa-check-double',
                        points: [
                            'No need to sell your long-term investments',
                            'Avoid redemption and keep your compound growth active',
                            'Flexible repayment: Pay interest monthly, principal anytime',
                            'No foreclosure charges in most cases'
                        ]
                    },
                    {
                        heading: 'Risks & Best Use Cases',
                        icon: 'fa-circle-exclamation',
                        points: [
                            ' Market Fall: Sharp drops may trigger a "Margin Call" for more security',
                            'Best for: Business working capital and emergency funding',
                            'Best for: Bridging cash flow gaps without disturbing investments',
                            'Ideal for: Investors with large portfolios and business owners'
                        ]
                    }
                ]
            },
        };

        function openService(key) {
            const data = serviceDatabase[key];

            // Populate static headers
            document.getElementById('pTitle').innerText = data.title;
            document.getElementById('pIntro').innerText = data.intro;

            // Build dynamic blocks
            const grid = document.getElementById('dynamicInfoGrid');
            grid.innerHTML = '';

            data.sections.forEach(section => {
                const block = document.createElement('div');
                block.className = 'serv-info-block';

                const pointsList = section.points.map(p => `<li>${p}</li>`).join('');

                block.innerHTML = `
                <h4><i class="fa-solid ${section.icon}"></i> ${section.heading}</h4>
                <ul>${pointsList}</ul>
            `;
                grid.appendChild(block);
            });

            // Activate Popup
            document.getElementById('fullPagePopup').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeFullPage() {
            document.getElementById('fullPagePopup').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Escape key listener
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeFullPage();
        });
    


        //sliders

   let currentPos = 0;
const inner = document.getElementById('serv-slider-inner');
const navDots = document.querySelectorAll('.nav-dot');
const total = 4;

function renderSlider() {
    // Moves the inner container by percentage
    inner.style.transform = `translateX(-${currentPos * 25}%)`;
    
    // Update Active UI
    navDots.forEach((d, i) => {
        d.classList.toggle('active', i === currentPos);
    });
}

function autoRotate() {
    currentPos = (currentPos + 1) % total;
    renderSlider();
}

function jumpToSlide(index) {
    currentPos = index;
    renderSlider();
    resetCycle();
}

// Auto-play every 4.5 seconds
let rotationTimer = setInterval(autoRotate, 4500);

function resetCycle() {
    clearInterval(rotationTimer);
    rotationTimer = setInterval(autoRotate, 4500);
}

// Ensure the slider behaves correctly if the orientation changes
window.addEventListener('resize', renderSlider);

        //sliders



// services end

   
//market edu start

    
        window.addEventListener('scroll', () => {
            const wrapper = document.querySelector('.edu-scroll-lock');
            const layers = document.querySelectorAll('.zoom-layer');

            if (!wrapper) return;

            const wrapperTop = wrapper.offsetTop;
            const wrapperHeight = wrapper.offsetHeight;
            const scrollPos = window.scrollY - wrapperTop;
            const viewportHeight = window.innerHeight;

            if (scrollPos >= 0) {
                const totalLayers = layers.length;
                const scrollPerLayer = (wrapperHeight - viewportHeight) / totalLayers;

                layers.forEach((layer, index) => {
                    const start = index * scrollPerLayer;
                    const end = (index + 1) * scrollPerLayer;

                    // CARD 3: SPECIAL DOUBLE SCROLL & STICKY LOGIC
                    if (index === totalLayers - 1) {
                        // Only start showing after a long buffer
                        const bufferStart = start + (scrollPerLayer * 0.2);
                        if (scrollPos >= bufferStart) {
                            layer.style.visibility = 'visible';
                            layer.style.opacity = '1';
                            layer.style.transform = 'scale(1)';
                            layer.style.zIndex = 10;
                        } else {
                            layer.style.visibility = 'hidden';
                            layer.style.opacity = '0';
                            layer.style.transform = 'scale(0.6)';
                        }
                        return;
                    }

                    // CARD 1 & 2: ZOOM AND FADE LOGIC
                    if (scrollPos >= start && scrollPos < end) {
                        const progress = (scrollPos - start) / scrollPerLayer;
                        layer.style.visibility = 'visible';

                        if (progress <= 0.6) { // Extended reading buffer
                            layer.style.transform = 'scale(1)';
                            layer.style.opacity = '1';
                        } else {
                            const animProgress = (progress - 0.6) * 2.5;
                            const zoomValue = 1 + (animProgress * 1.5);
                            const opacityValue = 1 - animProgress;

                            layer.style.transform = `scale(${zoomValue})`;
                            layer.style.opacity = opacityValue;
                        }
                        layer.style.zIndex = totalLayers - index;
                    } else if (scrollPos < start) {
                        // Do not animate Card 1 entry if it's the very start
                        if (index !== 0) {
                            layer.style.transform = 'scale(0.6)';
                            layer.style.opacity = '0';
                        }
                        layer.style.visibility = (index === 0 && scrollPos === 0) ? 'visible' : 'hidden';
                    } else {
                        layer.style.transform = 'scale(2.5)';
                        layer.style.opacity = '0';
                        layer.style.visibility = 'hidden';
                    }
                });
            }
        });
    