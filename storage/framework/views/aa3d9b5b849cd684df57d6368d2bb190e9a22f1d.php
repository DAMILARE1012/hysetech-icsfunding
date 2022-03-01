<?php $__env->startSection('content'); ?>

    <style>
        .overlay {
            position: relative;
            width: 100%;
        }

        .overlayImg {
            opacity: 1;
            display: block;
            width: 100%;
            height: auto;
            transition: .5s ease;
            backface-visibility: hidden;
        }

        .overlayMiddle {
            transition: .5s ease;
            opacity: 0;
            position: absolute;
            top: 70%;
            left: 50%;
            transform: translate(-50%, -50%);
            -ms-transform: translate(-50%, -50%);
            text-align: center;
        }

        .overlay:hover .overlayImg {
            opacity: 0.3;
        }

        .overlay:hover .overlayMiddle {
            opacity: 1;
        }

        .overlayText{
            font-size: 30px;
        }

        .overlayText:hover {
            cursor: pointer;
        }

    </style>
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container position-relative">
            <h1>
                MAKE YOURS
                <br/>
                A
                <br/>
                VIBRANT BUSINESS
            </h1>
            <h2>
                We have covered the basics of what to look for in a business loan as
                well as the many types of business loans available.
            </h2>
            <a href="#contact" class="btn-get-started scrollto">Apply now</a>
        </div>
    </section>

    <main id="main">

        <section id="services" class="services">
            <div class="container">
                <div class="section-title">
                    <h2>Available loans</h2>
                </div>

                <div class="row">
                    <div
                        class="col-lg-6 d-flex align-items-stretch mb-4"
                        data-aos="zoom-in"
                        data-aos-delay="100"
                    >
                        <div
                            class="
                  icon-box
                  d-flex
                  align-items-center
                  justify-content-between
                "
                            style="gap: 10px"
                        >
                            <div class="icon">
                                <img
                                    src="<?php echo e(asset('web')); ?>/img/services/001-network.svg"
                                    alt=""
                                    class="img-fluid"
                                />
                            </div>
                            <div class="icon-text">
                                <h4><a href="">Business Term Loan</a></h4>
                                <p>
                                    Not secured by physical collateral, such as property, but by
                                    company director’s personal guarantees.
                                </p>
                            </div>
                            <div class="side-icon d-sm-none">
                  <span>
                    <svg
                        width="8"
                        height="12"
                        viewBox="0 0 8 12"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                          d="M0.589844 10.59L5.16984 6L0.589844 1.41L1.99984 0L7.99984 6L1.99984 12L0.589844 10.59Z"
                          fill="black"
                      />
                    </svg>
                  </span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 d-flex align-items-stretch mb-4"
                        data-aos="zoom-in"
                        data-aos-delay="100"
                    >
                        <div
                            class="
                  icon-box
                  d-flex
                  align-items-center
                  justify-content-between
                "
                            style="gap: 10px"
                        >
                            <div class="icon">
                                <img
                                    src="<?php echo e(asset('web')); ?>/img/services/002-team.svg"
                                    alt=""
                                    class="img-fluid"
                                />
                            </div>
                            <div class="icon-text">
                                <h4><a href="">Business Term Loan</a></h4>
                                <p>
                                    Not secured by physical collateral, such as property, but by
                                    company director’s personal guarantees.
                                </p>
                            </div>
                            <div class="side-icon d-sm-none">
                  <span>
                    <svg
                        width="8"
                        height="12"
                        viewBox="0 0 8 12"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                          d="M0.589844 10.59L5.16984 6L0.589844 1.41L1.99984 0L7.99984 6L1.99984 12L0.589844 10.59Z"
                          fill="black"
                      />
                    </svg>
                  </span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 d-flex align-items-stretch mb-4"
                        data-aos="zoom-in"
                        data-aos-delay="100"
                    >
                        <div
                            class="
                  icon-box
                  d-flex
                  align-items-center
                  justify-content-between
                "
                            style="gap: 10px"
                        >
                            <div class="icon">
                                <img
                                    src="<?php echo e(asset('web')); ?>/img/services/003-bullhorn.svg"
                                    alt=""
                                    class="img-fluid"
                                />
                            </div>
                            <div class="icon-text">
                                <h4><a href="">Business Term Loan</a></h4>
                                <p>
                                    Not secured by physical collateral, such as property, but by
                                    company director’s personal guarantees.
                                </p>
                            </div>
                            <div class="side-icon d-sm-none">
                  <span>
                    <svg
                        width="8"
                        height="12"
                        viewBox="0 0 8 12"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                          d="M0.589844 10.59L5.16984 6L0.589844 1.41L1.99984 0L7.99984 6L1.99984 12L0.589844 10.59Z"
                          fill="black"
                      />
                    </svg>
                  </span>
                            </div>
                        </div>
                    </div>
                    <div
                        class="col-lg-6 d-flex align-items-stretch mb-4"
                        data-aos="zoom-in"
                        data-aos-delay="100"
                    >
                        <div
                            class="
                  icon-box
                  d-flex
                  align-items-center
                  justify-content-between
                "
                            style="gap: 10px"
                        >
                            <div class="icon">
                                <img
                                    src="<?php echo e(asset('web')); ?>/img/services/004-project-management.svg"
                                    alt=""
                                    class="img-fluid"
                                />
                            </div>
                            <div class="icon-text">
                                <h4><a href="">Business Term Loan</a></h4>
                                <p>
                                    Not secured by physical collateral, such as property, but by
                                    company director’s personal guarantees.
                                </p>
                            </div>
                            <div class="side-icon d-sm-none">
                  <span>
                    <svg
                        width="8"
                        height="12"
                        viewBox="0 0 8 12"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                    >
                      <path
                          d="M0.589844 10.59L5.16984 6L0.589844 1.41L1.99984 0L7.99984 6L1.99984 12L0.589844 10.59Z"
                          fill="black"
                      />
                    </svg>
                  </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="loan" class="loan">
            <div class="container">
                <div class="loan-calculator">
                    <div class="section-title">
                        <h2>Loan Calculator</h2>
                    </div>
                    <div class="row">
                        <div class="col-md-10">
                            <p>
                                Calculate the monthly instalments, total interest payable and
                                total payment required.
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 order-2 order-md-1">
                            <div class="disclaimer mt-4">
                                <h6>Disclaimer</h6>
                                <p>
                                    The Loan Calculator (the “Tool”) is an indicative tool and
                                    is meant to provide information and estimates of a general
                                    nature based on information provided by you. ICS Funding
                                    does not guarantee the accuracy, adequacy, reliability or
                                    completeness of any information or computation or
                                    recommendation provided by the Tool
                                </p>
                                <h6 class="more">Learn more</h6>
                            </div>
                        </div>
                        <div class="col-md-8 order-1 order-md-2">
                            <form action="">
                                <div class="form-group">
                                    <label for="typeLoan">
                                        <p>Type of Loan</p>
                                    </label>
                                    <select class="form-control" id="typeLoan">
                                        <option value="Business term loan">
                                            Business term loan
                                        </option>
                                        <option value="Business term loan">
                                            Business term loan
                                        </option>
                                        <option value="Business term loan">
                                            Business term loan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label
                                        for="loanAmount"
                                        class="d-flex align-items-center mb-2"
                                    >
                                        <p>Loan Amount</p>

                                        <span class="inline-block ml-auto">
                        <svg
                            width="15"
                            height="14"
                            viewBox="0 0 15 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                              d="M6.8117 11.2H8.15049V9.8H6.8117V11.2ZM7.48109 0C3.78601 0 0.787109 3.136 0.787109 7C0.787109 10.864 3.78601 14 7.48109 14C11.1762 14 14.1751 10.864 14.1751 7C14.1751 3.136 11.1762 0 7.48109 0ZM7.48109 12.6C4.52905 12.6 2.12591 10.087 2.12591 7C2.12591 3.913 4.52905 1.4 7.48109 1.4C10.4331 1.4 12.8363 3.913 12.8363 7C12.8363 10.087 10.4331 12.6 7.48109 12.6ZM7.48109 2.8C6.00172 2.8 4.8035 4.053 4.8035 5.6H6.1423C6.1423 4.83 6.74476 4.2 7.48109 4.2C8.21743 4.2 8.81989 4.83 8.81989 5.6C8.81989 7 6.8117 6.825 6.8117 9.1H8.15049C8.15049 7.525 10.1587 7.35 10.1587 5.6C10.1587 4.053 8.96047 2.8 7.48109 2.8Z"
                              fill="#66738B"
                          />
                        </svg>
                      </span>
                                    </label>

                                </div>
                                <div class="form-group">
                                    <label
                                        for="loanTenure"
                                        class="d-flex align-items-center mb-2"
                                    >
                                        <p>Loan Tenure</p>

                                        <span class="inline-block ml-auto">
                        <svg
                            width="15"
                            height="14"
                            viewBox="0 0 15 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                              d="M6.8117 11.2H8.15049V9.8H6.8117V11.2ZM7.48109 0C3.78601 0 0.787109 3.136 0.787109 7C0.787109 10.864 3.78601 14 7.48109 14C11.1762 14 14.1751 10.864 14.1751 7C14.1751 3.136 11.1762 0 7.48109 0ZM7.48109 12.6C4.52905 12.6 2.12591 10.087 2.12591 7C2.12591 3.913 4.52905 1.4 7.48109 1.4C10.4331 1.4 12.8363 3.913 12.8363 7C12.8363 10.087 10.4331 12.6 7.48109 12.6ZM7.48109 2.8C6.00172 2.8 4.8035 4.053 4.8035 5.6H6.1423C6.1423 4.83 6.74476 4.2 7.48109 4.2C8.21743 4.2 8.81989 4.83 8.81989 5.6C8.81989 7 6.8117 6.825 6.8117 9.1H8.15049C8.15049 7.525 10.1587 7.35 10.1587 5.6C10.1587 4.053 8.96047 2.8 7.48109 2.8Z"
                              fill="#66738B"
                          />
                        </svg>
                      </span>
                                    </label>

                                    <select class="form-control" id="loanTenure">
                                        <option value="Select Tenure">Select Tenure</option>
                                        <option value="Select Tenure">Select Tenure</option>
                                        <option value="Select Tenure">Select Tenure</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label
                                        for="interestRate"
                                        class="d-flex align-items-center mb-2"
                                    >
                                        <p>Interest rate</p>

                                        <span class="inline-block ml-auto">
                        <svg
                            width="15"
                            height="14"
                            viewBox="0 0 15 14"
                            fill="none"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                          <path
                              d="M6.8117 11.2H8.15049V9.8H6.8117V11.2ZM7.48109 0C3.78601 0 0.787109 3.136 0.787109 7C0.787109 10.864 3.78601 14 7.48109 14C11.1762 14 14.1751 10.864 14.1751 7C14.1751 3.136 11.1762 0 7.48109 0ZM7.48109 12.6C4.52905 12.6 2.12591 10.087 2.12591 7C2.12591 3.913 4.52905 1.4 7.48109 1.4C10.4331 1.4 12.8363 3.913 12.8363 7C12.8363 10.087 10.4331 12.6 7.48109 12.6ZM7.48109 2.8C6.00172 2.8 4.8035 4.053 4.8035 5.6H6.1423C6.1423 4.83 6.74476 4.2 7.48109 4.2C8.21743 4.2 8.81989 4.83 8.81989 5.6C8.81989 7 6.8117 6.825 6.8117 9.1H8.15049C8.15049 7.525 10.1587 7.35 10.1587 5.6C10.1587 4.053 8.96047 2.8 7.48109 2.8Z"
                              fill="#66738B"
                          />
                        </svg>
                      </span>
                                    </label>

                                    <select class="form-control" id="interestRate">
                                        <option value="7.2">7.2</option>
                                        <option value="7.2">7.2</option>
                                        <option value="7.2">7.2</option>
                                    </select>
                                </div>
                                <div class="form-btns d-flex justify-content-between">
                                    <button
                                        class="
                        btn
                        reset
                        d-flex
                        justify-content-center
                        align-items-center
                      "
                                    >
                                        Reset
                                    </button>
                                    <button
                                        class="
                        btn
                        calculate
                        d-flex
                        justify-content-center
                        align-items-center
                      "
                                    >
                                        Calculate
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        
        
        
        
        
        

        
        
        
        
        
        
        
        
        
        <section id="blog" class="newsletter">
            <div class="container">
                <div class="section-title">
                    <h2>Blog</h2>
                    <a href="#"> View all </a>
                </div>

                <div class="owl-carousel newletter-carousel">
                    <?php if($blogs->count()): ?>
                        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="newletter-item overlay">
                                <div class="news-img">
                                    <img src="<?php echo e($blog->featured_image?asset('storage').'/'.$blog->featured_image:asset('web/img/newsletter/portfolio-1.jpg')); ?>"
                                         alt=""
                                         class="img-fluid rounded overlayImg"
                                    />
                                    <div class="overlayMiddle">
                                        <a href="<?php echo e(route('web.blog.details', $blog)); ?>"
                                            class="overlayText text-primary">
                                            <?php echo e($blog->title); ?>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hysetech-icsfunding\resources\views/web/sections/index.blade.php ENDPATH**/ ?>