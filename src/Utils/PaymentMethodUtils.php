<?php

declare(strict_types=1);

namespace Basecom\FixturePlugin\Utils;

use Shopware\Core\Checkout\Payment\Cart\PaymentHandler\InvoicePayment;
use Shopware\Core\Checkout\Payment\PaymentMethodEntity;
use Shopware\Core\Framework\Context;
use Shopware\Core\Framework\DataAbstractionLayer\EntityRepository;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Criteria;
use Shopware\Core\Framework\DataAbstractionLayer\Search\Filter\EqualsFilter;

class PaymentMethodUtils
{
    private EntityRepository $paymentMethodRepository;

    public function __construct(EntityRepository $paymentMethodRepository)
    {
        $this->paymentMethodRepository = $paymentMethodRepository;
    }

    public function getInvoicePaymentMethod(): ?PaymentMethodEntity
    {
        $criteria = (new Criteria())->addFilter(
            new EqualsFilter('handlerIdentifier', InvoicePayment::class)
        )->setLimit(1);

        return $this->paymentMethodRepository
            ->search(
                $criteria,
                Context::createDefaultContext()
            )->first();
    }
}
