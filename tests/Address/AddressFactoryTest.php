<?php

namespace BitWasp\Bitcoin\Tests\Address;

use BitWasp\Bitcoin\Address\AddressFactory;
use BitWasp\Bitcoin\Address\PayToPubKeyHashAddress;
use BitWasp\Bitcoin\Crypto\EcAdapter\Key\KeyInterface;
use BitWasp\Bitcoin\Tests\AbstractTestCase;
use BitWasp\Buffertools\BufferInterface;

class AddressFactoryTest extends AbstractTestCase
{
    public function testFromKey()
    {
        $pubKeyHash = $this->getMockBuilder(BufferInterface::class)->getMock();
        
        $key = $this->getMockBuilder(KeyInterface::class)->getMock();
        
        $key->expects($this->once())
            ->method('getPubKeyHash')
            ->willReturn($pubKeyHash);
        
        $address = AddressFactory::fromKey($key);
        
        $this->assertInstanceOf(PayToPubKeyHashAddress::class, $address);
    }
}
